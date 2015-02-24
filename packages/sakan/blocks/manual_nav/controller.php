<?php 
namespace Concrete\Package\Sakan\Block\ManualNav;

use Concrete\Core\Block\BlockController;
use Loader;
use Page;
defined('C5_EXECUTE') or die("Access Denied.");
class Controller extends BlockController 
{
	
	protected $btTable = 'btManualNav';
	protected $btInterfaceWidth = "600";
	protected $btInterfaceHeight = "480";

	protected $btCacheBlockRecord = true;
	protected $btCacheBlockOutput = true;
	protected $btCacheBlockOutputOnPost = true;
	protected $btCacheBlockOutputForRegisteredUsers = true;
	protected $btCacheBlockOutputLifetime = CACHE_LIFETIME;
		
	public function getBlockTypeName() {
		return t("Manual Nav");
	}

	public function getBlockTypeDescription() {
		return t('Manually choose pages for a navigation menu.');
	}

	public function getJavaScriptStrings() {
		return array(
			'one-link-required' => t('You must choose at least one link.'),
		);
	}
	
	function add() {
		$this->set('links', array());
	}
	
	function edit() {
		$links = $this->getLinks();
		$this->set('links', $links);
	}
	
	function view() {
		$nh = Loader::helper('navigation');
		$currentPage = Page::getCurrentPage();
		$currentCID = $currentPage->getCollectionID();
		$currentCPath = $currentPage->getCollectionPath();
		
		$linkRows = $this->getLinks();
		$linkObjs = array();
		
		foreach ($linkRows as $row) {
			$page = Page::getByID($row['linkToCID']);
			$linkCPath = $page->getCollectionPath();
			$link = new stdClass;
			$link->url = $nh->getLinkToCollection($page);
			$link->text = $row['linkText'];
			$link->cID = $row['linkToCID'];
			$link->cPath = $linkCPath;
			$link->isCurrent = ($currentCID === $row['linkToCID']);
			$link->inPath = $this->isPageInPath($currentCPath, $linkCPath);
			$link->cObj = $page;
			$linkObjs[] = $link;
		}
		$this->set('links', $linkObjs);
	}
	//Internal utility function -- tells you if the first path is "under" the second path
	// (meaning that the first path is equal to or begins with the second path).
	//EXCEPT: if underSectionPath is the home page and checkPagePath is *not* the home page,
	// then we always return false (because *every* page in a C5 site is under the home page,
	// so it's not meaningful information)
	private function isPageInPath($checkPagePath, $underSectionPath) {
		//DEV NOTE: All this checking for home pages has a secondary benefit:
		// some users have reported that php warnings are generated when you pass
		// an empty string to the strpos() function, so by checking for home page
		// first, we can avoid calling strpos if either path is empty.
		$pagePathIsHome = empty($checkPagePath);
		$sectionPathIsHome = empty($underSectionPath);
		if ($pagePathIsHome && $sectionPathIsHome) {
			return true;
		} else if ($pagePathIsHome || $sectionPathIsHome) {
			return false;
		} else {
			return (strpos($checkPagePath, $underSectionPath) === 0);
		}
	}
	
	function getLinks() {
		$db = Loader::db();
		$sql = 'SELECT * FROM btManualNavLinks WHERE bID=' . intval($this->bID) . ' ORDER BY position';
		return $db->getAll($sql);
	}	
	
	function delete(){
		$db = Loader::db();
		$db->query("DELETE FROM btManualNavLinks WHERE bID=".intval($this->bID));		
		parent::delete();
	}

	function duplicate($nbID) {
		parent::duplicate($nbID);
		$links = $this->getLinks();
		$db = Loader::db();
		$sql = "INSERT INTO btManualNavLinks (bID, linkToCID, linkText, position)"
		 	 . " SELECT ?, linkToCID, linkText, position FROM btManualNavLinks WHERE bID = ?";
		$vals = array($nbID, $this->bID);
		$db->Execute($sql, $vals);
	}
	
	function save($data) {
		$db = Loader::db();
		if(count($data['linkToCIDs']) ){
			//delete existing links
			$db->query("DELETE FROM btManualNavLinks WHERE bID = ?", array($this->bID));
			
			//loop through and add the links
			$pos=0;
			foreach($data['linkToCIDs'] as $linkToCID){ 
				if(intval($linkToCID)==0 || $data['LinkTexts'][$pos]=='tempLinkText') continue;
				$sql = "INSERT INTO btManualNavLinks (bID, linkToCID, linkText, position) values (?,?,?,?)";
				$vals = array($this->bID, $linkToCID, $data['linkTexts'][$pos], $pos);
				$db->Execute($sql, $vals);
				$pos++;
			}
		}

		parent::save($data);
	}

}

?>

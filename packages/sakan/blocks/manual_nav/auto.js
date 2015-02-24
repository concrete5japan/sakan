//Dev note: Can't use the standard ccm_selectSitemapNode because it conflicts with Mnkras's page_redirect addon.
//          Not sure why/how, but using a different function name here (and passing that as the "callback"
//          querystring arg in the url to sitemap_search_selector.php in edit.php) fixes the problem.
manualNav_selectSitemapNode = function(cID, cName) {
	ManualNavBlock.addRow(cID, cName);
}
var ManualNavBlock = {
	
	init:function(){},
	
	addRowNewId:0,
	addRow: function(cID, cName) {
		this.addRowNewId--; //negative counter - so it doesn't compete with existing rowIds
		var rowId=this.addRowNewId;
		var templateHTML=$('#rowTemplateWrap .ccm-edit-row').html();
		templateHTML=templateHTML.replace(/tempRowId/g,rowId);
		templateHTML=templateHTML.replace(/tempLinkToCID/g,cID);
		templateHTML=templateHTML.replace(/tempLinkText/g,cName);
		var newRow = document.createElement("div");
		newRow.innerHTML=templateHTML;
		newRow.id='ccm-edit-row'+parseInt(rowId);
		newRow.className='ccm-edit-row';
		document.getElementById('ccm-edit-rows').appendChild(newRow);
	},
	
	removeRow: function(rowId){
		$('#ccm-edit-row'+rowId).remove();
	},
	
	moveUp:function(rowId){
		var thisRow=$('#ccm-edit-row'+rowId);
		var qIDs=this.serialize();
		var previousQID=0;
		for(var i=0;i<qIDs.length;i++){
			if(qIDs[i]==rowId){
				if(previousQID==0) break; 
				thisRow.after($('#ccm-edit-row'+previousQID));
				break;
			}
			previousQID=qIDs[i];
		}	 
	},
	moveDown:function(rowId){
		var thisRow=$('#ccm-edit-row'+rowId);
		var qIDs=this.serialize();
		var thisQIDfound=0;
		for(var i=0;i<qIDs.length;i++){
			if(qIDs[i]==rowId){
				thisQIDfound=1;
				continue;
			}
			if(thisQIDfound){
				$('#ccm-edit-row'+qIDs[i]).after(thisRow);
				break;
			}
		}
	},
	serialize:function(){
		var t = document.getElementById("ccm-edit-rows");
		var qIDs=[];
		for(var i=0;i<t.childNodes.length;i++){ 
			if( t.childNodes[i].className && t.childNodes[i].className.indexOf('ccm-edit-row')>=0 ){
				var qID=t.childNodes[i].id.replace('ccm-edit-row','');
				qIDs.push(qID);
			}
		}
		return qIDs;
	},

	validate:function(){
		qIDs=this.serialize();
		if( qIDs.length<1 ){
			ccm_addError(ccm_t('one-link-required'));
		}
		
		return false;
	} 
}

ccmValidateBlockForm = function() { return ManualNavBlock.validate(); }

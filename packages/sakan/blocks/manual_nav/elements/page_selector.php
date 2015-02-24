<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>
<div class="ccm-summary-selected-item" data-page-selector="pageselectorid<%=sort%>">
	<div class="ccm-summary-selected-item-inner">
		<strong class="ccm-summary-selected-item-label"><%=pageName%></strong>
	</div>
	<a class="ccm-sitemap-select-page" data-page-selector-launch="pageselectorid<%=sort%>" dialog-width="90%" dialog-height="70%" dialog-append-buttons="true" dialog-modal="false" dialog-title="<?php echo t('Choose Page')?>" href="<?php  echo View::url('/'); ?>/tools/required/sitemap_search_selector?cID=0" dialog-on-close="Concrete.event.fire('fileselectorclose', '{$fieldName}');"><?php echo t('Select Page')?></a>
	<a href="javascript:void(0)" dialog-sender="pageselectorid<%=sort%>" data-page-selector-clear="pageselectorid<%=sort%>" class="ccm-sitemap-clear-selected-page" style="float: right; margin-top: -8px;color:#d9534f">
    	<i class="fa fa-trash"></i>
    	<input type="hidden" data-page-selector="cID" name="pageID[]" value="<%=pageID%>">
	</a>
</div>
<% print("<sc" + "ript type='text/javascript'>"); %>
$(function() {
	var ccmActivePageField;
	var launcher = $('a[data-page-selector-launch="pageselectorid<%=sort%>"]'), name = 'pageselectorid<%=sort%>', openEvent, openEvent2;
	var container = $('div[data-page-selector="' + name + '"]');
	launcher.dialog();
	ConcreteEvent.bind('fileselectorclose', function(field_name) {
	    ConcreteEvent.unbind('ConcreteSitemap.' + name);
	    ConcreteEvent.unbind('SitemapSelectPage.' + name);
	    ConcreteEvent.unbind('ConcreteSitemapPageSearch.' + name);
	});
	launcher.on('click', function () {
	    var selector = $(this),
	        handle_select = function(e, data) {
	            ConcreteEvent.unbind(e);
	            var handle = selector.attr('data-page-selector-launch');
	            container.find('.ccm-summary-selected-item-label').html(data.title);
	            container.find('.ccm-sitemap-clear-selected-page').show();
	            container.find('input[data-page-selector=cID]').val(data.cID);
	            $.fn.dialog.closeTop();
	        };
	
	    ConcreteEvent.bind('ConcreteSitemap.' + name, function (event, sitemap) {
	        ConcreteEvent.subscribe('SitemapSelectPage.' + name, function (e, data) {
	            if (data.instance === sitemap) {
	                handle_select(e, data);
	            }
	        });
	    });
	
	    ConcreteEvent.bind('ConcreteSitemapPageSearch.' + name, function (event, search) {
	
	        ConcreteEvent.subscribe('SitemapSelectPage.' + name, function (e, data) {
	            if (data.instance === search) {
	                handle_select(e, data);
	            }
	        });
	    });
	});
	
	$('a[data-page-selector-clear=pageselectorid<%=sort%>]').click(function () {
	    var container = $('div[data-page-selector=pageselectorid<%=sort%>]');
	    container.find('.ccm-summary-selected-item-label').html('');
	    container.find('.ccm-sitemap-clear-selected-page').hide();
	    container.find('input[data-page-selector=cID]').val('');
	});
});
<% print("</sc"+"ript>"); %>
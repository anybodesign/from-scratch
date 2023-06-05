wp.domReady( function() {

	var allowedBlocks = [
	    'acf/gallery',	// ACF blocks
		'acf/posts',
		'acf/cta',
		'acf/cards',
		'acf/files',
		'acf/testimonial',
		'acf/textimg',
		'acf/text',
		'acf/anchor',
		'acf/advanced-list',
		'acf/pagebanner',
        'core/block', // Include to show reusable blocks in the block inserter
		'core/paragraph',
		'core/heading',
		'core/list',
		'core/list-item',
	    'core/image',
		'core/audio',
	    'core/quote',
	    'core/button',
		'core/buttons',
		'core/column',
		'core/columns',
		'core/embed',
		'core/file',
		'core/group',
		'core/more',
		'core/shortcode',
		'core/nextpage',
		'core/separator',
		'core/spacer',
		'core/missing',
		'core/video', // Other core blocks
		'core/code',
		'core/table',
		'core/cover',
		'core/freeform',
		'core/html',
		'core/media-text',
		'core/text-columns',
		'core/preformatted',
		'gravityforms/form', // Gravity & plugins
		'contact-form-7/contact-form-selector', // CF7		
	];
	
	const allowedEmbedBlocks = [
		'vimeo',
		'youtube',
	];
	
	wp.blocks.getBlockTypes().forEach( function ( blockType ) {
	    if ( allowedBlocks.indexOf( blockType.name ) === -1 ) {
	        wp.blocks.unregisterBlockType( blockType.name );
	    }
	} );


	wp.blocks.getBlockVariations('core/embed').forEach(function (blockVariation) {
		if (-1 === allowedEmbedBlocks.indexOf(blockVariation.name)) {
			wp.blocks.unregisterBlockVariation('core/embed', blockVariation.name);
		}
	});

	
	// List all block types available
	
	//wp.blocks.getBlockTypes().forEach( function( blockType ){ console.log( blockType.name ); }); 
	
});


/* 
[Log] acf/advanced-list (byebyeblocks.js, line 55)
[Log] acf/anchor (byebyeblocks.js, line 55)
[Log] acf/cards (byebyeblocks.js, line 55)
[Log] acf/cta (byebyeblocks.js, line 55)
[Log] acf/files (byebyeblocks.js, line 55)
[Log] acf/gallery (byebyeblocks.js, line 55)
[Log] acf/pagebanner (byebyeblocks.js, line 55)
[Log] acf/posts (byebyeblocks.js, line 55)
[Log] acf/testimonial (byebyeblocks.js, line 55)
[Log] acf/text (byebyeblocks.js, line 55)
[Log] acf/textimg (byebyeblocks.js, line 55)
[Log] core/paragraph (byebyeblocks.js, line 55)
[Log] core/image (byebyeblocks.js, line 55)
[Log] core/heading (byebyeblocks.js, line 55)
[Log] core/gallery (byebyeblocks.js, line 55)
[Log] core/list (byebyeblocks.js, line 55)
[Log] core/quote (byebyeblocks.js, line 55)
[Log] core/shortcode (byebyeblocks.js, line 55)
[Log] core/archives (byebyeblocks.js, line 55)
[Log] core/audio (byebyeblocks.js, line 55)
[Log] core/button (byebyeblocks.js, line 55)
[Log] core/buttons (byebyeblocks.js, line 55)
[Log] core/calendar (byebyeblocks.js, line 55)
[Log] core/categories (byebyeblocks.js, line 55)
[Log] core/code (byebyeblocks.js, line 55)
[Log] core/columns (byebyeblocks.js, line 55)
[Log] core/column (byebyeblocks.js, line 55)
[Log] core/cover (byebyeblocks.js, line 55)
[Log] core/embed (byebyeblocks.js, line 55)
[Log] core/file (byebyeblocks.js, line 55)
[Log] core/group (byebyeblocks.js, line 55)
[Log] core/freeform (byebyeblocks.js, line 55)
[Log] core/html (byebyeblocks.js, line 55)
[Log] core/media-text (byebyeblocks.js, line 55)
[Log] core/latest-comments (byebyeblocks.js, line 55)
[Log] core/latest-posts (byebyeblocks.js, line 55)
[Log] core/missing (byebyeblocks.js, line 55)
[Log] core/more (byebyeblocks.js, line 55)
[Log] core/nextpage (byebyeblocks.js, line 55)
[Log] core/page-list (byebyeblocks.js, line 55)
[Log] core/preformatted (byebyeblocks.js, line 55)
[Log] core/pullquote (byebyeblocks.js, line 55)
[Log] core/rss (byebyeblocks.js, line 55)
[Log] core/search (byebyeblocks.js, line 55)
[Log] core/separator (byebyeblocks.js, line 55)
[Log] core/block (byebyeblocks.js, line 55)
[Log] core/social-links (byebyeblocks.js, line 55)
[Log] core/social-link (byebyeblocks.js, line 55)
[Log] core/spacer (byebyeblocks.js, line 55)
[Log] core/table (byebyeblocks.js, line 55)
[Log] core/tag-cloud (byebyeblocks.js, line 55)
[Log] core/text-columns (byebyeblocks.js, line 55)
[Log] core/verse (byebyeblocks.js, line 55)
[Log] core/video (byebyeblocks.js, line 55)
[Log] core/site-logo (byebyeblocks.js, line 55)
[Log] core/site-tagline (byebyeblocks.js, line 55)
[Log] core/site-title (byebyeblocks.js, line 55)
[Log] core/query (byebyeblocks.js, line 55)
[Log] core/post-template (byebyeblocks.js, line 55)
[Log] core/query-title (byebyeblocks.js, line 55)
[Log] core/query-pagination (byebyeblocks.js, line 55)
[Log] core/query-pagination-next (byebyeblocks.js, line 55)
[Log] core/query-pagination-numbers (byebyeblocks.js, line 55)
[Log] core/query-pagination-previous (byebyeblocks.js, line 55)
[Log] core/post-title (byebyeblocks.js, line 55)
[Log] core/post-content (byebyeblocks.js, line 55)
[Log] core/post-date (byebyeblocks.js, line 55)
[Log] core/post-excerpt (byebyeblocks.js, line 55)
[Log] core/post-featured-image (byebyeblocks.js, line 55)
[Log] core/post-terms (byebyeblocks.js, line 55)
[Log] core/loginout (byebyeblocks.js, line 55)
*/
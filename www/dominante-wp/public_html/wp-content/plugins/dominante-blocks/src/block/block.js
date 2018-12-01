/**
 * BLOCK: dominante-blocks
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
import './style.scss';
import './editor.scss';

const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks


/**
 * Register: aa Gutenberg Block.
 *
 * Registers a new block provided a unique name and an object defining its
 * behavior. Once registered, the block is made editor as an option to any
 * editor interface where blocks are implemented.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */
function getDominanteBlock(title, content_type, icon) {
    return {
      // Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
      title: title, // Block title.
      icon: icon, // Block icon from Dashicons → https://developer.wordpress.org/resource/dashicons/.
      category: 'dominante', // Block category — Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.
      /**
       * The edit function describes the structure of your block in the context of the editor.
       * This represents what the editor will render when the block is used.
       *
       * The "edit" property must be a valid function.
       *
       * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
       */
      edit: function( props ) {
        // Creates a <p class='wp-block-cgb-block-dominante-blocks'></p>.
        return (
          <div className={ props.className }>
            <p>So awesome! Yay</p>
            <p>
              It was created via{ ' ' }
              <code>
                <a href="https://github.com/ahmadawais/create-guten-block">
                  create-guten-block
                </a>
              </code>.
            </p>
          </div>
        );
      },

      /**
       * The save function defines the way in which the different attributes should be combined
       * into the final markup, which is then serialized by Gutenberg into post_content.
       *
       * The "save" property must be specified and must be a valid function.
       *
       * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
       */
      save: function( props ) {
        return (
          <div>
            <p>Hello from the frontend.</p>
            <p>
              It was created via{ ' ' }
              <code>
                <a href="https://github.com/ahmadawais/create-guten-block">
                  create-guten-block
                </a>
              </code>.
            </p>
          </div>
        );
      },
    }
}

registerBlockType(
  'cgb/block-dominante-blocks-news',
  getDominanteBlock('News piece', 'news_piece', 'format-aside')
);
registerBlockType(
  'cgb/block-dominante-blocks-album',
  getDominanteBlock('Album', 'album', 'format-audio')
);
registerBlockType(
  'cgb/block-dominante-blocks-trip',
  getDominanteBlock('Trip', 'trip', 'palmtree')
);
registerBlockType(
  'cgb/block-dominante-blocks-concert',
  getDominanteBlock('Concert', 'concert', 'tickets-alt')
);



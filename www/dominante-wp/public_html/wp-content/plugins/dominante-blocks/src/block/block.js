/**
 * BLOCK: dominante-blocks
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
import './style.scss';
import './editor.scss';
const { Component } = wp.element;

const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks
const { SelectControl, ServerSideRender } = wp.components;
const { InspectorControls } = wp.editor;

class DominanteBlockEdit extends Component {
  constructor(props) {
    super(props);

    this.state = { items: null, selectedItemId: props.attributes.selectedItemId || null };

    this.getItems(props);
  }

  getItems = () => {
    const { contentType } = this.props;
    const props = this.props;

    const contentTypeClass = contentType[0].toUpperCase() + contentType.slice(1);


    return ( new wp.api.collections[contentTypeClass]() ).fetch().then( ( items ) => {
      if (items) {
        const selectedItemId = props.attributes.selectedItemId || (items[0] && items[0].id);

        this.props.setAttributes({ selectedItemId });
        this.setState({
          items,
          selectedItemId
        });
      }
    });
  };

  setItems = (item) => {
    const id = parseInt(item);
    this.setState({ selectedItemId: id })
    this.props.setAttributes({ selectedItemId: id })
  };

  render = () => {
    const { contentType,contentTypeName } = this.props;
    const { selectedItemId, items } = this.state;

    if (items == null) {
      return <p>Loading content items...</p>
    } else if (items.length == 0) {

      return <p>{`No content available. Please create some new ${contentTypeName}s!`}</p>
    } else {
      const selectTitle = `Select ${contentTypeName}`;
      let options = items.map((item) =>
        ({value:item.id, label:item.title.rendered})
      );

      return (
        <p>
          <ServerSideRender
            block={`cgb/block-dominante-blocks-${contentType.replace('_','-')}`}
            attributes={{selectedItemId}}
          />
          <InspectorControls key='inspector'>
            <SelectControl
              value={ selectedItemId }
              label={ selectTitle }
              options={ options }
              onChange={ this.setItems }
            />
          </InspectorControls>
        </p>
      )
    }
  }
}

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
function getDominanteBlock(title, contentType, icon) {
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
        // Creates a <p class='wp-block-cgb-block-dominante-blocks'></p> (or something like that.....?)
        return (
          <div >
            <DominanteBlockEdit contentType={contentType} contentTypeName={title} {...props} />
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
        return null
      },
    }
}

registerBlockType(
  'cgb/block-dominante-blocks-news-piece',
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



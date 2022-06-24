import { registerBlockType } from '@wordpress/blocks'
import { InnerBlocks } from '@wordpress/block-editor'

registerBlockType(
     'blocktheme/navbar', {
          title: 'Navbar',
          supports: {
               align: ['full']
          },
          attributes: {
               align: { type: "string", default: "full" }
          },
          edit: EditComponent,
          save: SaveComponent
     }
)

function EditComponent() {
     return (
          <>
          <nav class="navbar navbar-dark navbar-expand-md fixed-top">
               <div class="container">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar">
                         <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="/">
                         <InnerBlocks allowedBlocks={ [ 'core/paragraph' ] }></InnerBlocks>
                    </a>
               </div>
          </nav>
          </>
     )
}

function SaveComponent() {
     return <InnerBlocks.Content />
}
import { registerBlockType } from '@wordpress/blocks'
import { InnerBlocks } from '@wordpress/block-editor'

registerBlockType(
     'blocktheme/customfooter', {
          title: 'Custom Footer',
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
<footer className="footer">
    <div className="container">
        <div className="row">
               <div className="col-8 col-md-5">
                    <InnerBlocks allowedBlocks={ [ 'core/paragraph' ] }></InnerBlocks>
               </div>
          </div>
        <div className="row justify-content-center row-copyright">
            <div className="col-auto">
                <p>&copy; Copyright 2020 Traditional Theme Pvt. Ltd | All rights reserved</p>
            </div>
        </div>
    </div>
</footer>
          </>
     )
}

function SaveComponent() {
     return <InnerBlocks.Content />
}
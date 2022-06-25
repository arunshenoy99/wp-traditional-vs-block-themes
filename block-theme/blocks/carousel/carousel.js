import { registerBlockType } from '@wordpress/blocks'
import { InnerBlocks } from '@wordpress/block-editor'


registerBlockType(
     'blocktheme/carousel', {
          title: 'Carousel',
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
          <div id="mycarousel" className="carousel slide carousel-fade d-none d-md-block" data-ride="carousel">
               <div className="carousel-inner d-none d-md-block" role="listbox">
                    <p className="text-secondary">Add Slides Inside me</p>
                    <InnerBlocks allowedBlocks={ [ 'blocktheme/slide' ] }></InnerBlocks>
               </div>
          </div>
          </>
     )
}

function SaveComponent() {
     return <InnerBlocks.Content />
}
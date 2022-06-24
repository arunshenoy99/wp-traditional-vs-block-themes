import { registerBlockType } from '@wordpress/blocks'

registerBlockType(
     'blocktheme/posts', {
          title: 'Posts',
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
               <div class="container-fluid bg-secondary">
                    <div class="row row-content">
                         <div class="col-12 text-center text-white">
                              <h1>Custom Posts Block</h1>
                         </div>
                    </div>
               </div>
          </>
     )
}

function SaveComponent() {
     return null;
}
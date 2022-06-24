import apiFetch from "@wordpress/api-fetch"
import { Button, PanelBody, PanelRow } from "@wordpress/components"
import { InnerBlocks, InspectorControls, MediaUpload, MediaUploadCheck } from "@wordpress/block-editor"
import { registerBlockType } from "@wordpress/blocks"
import { useEffect } from "@wordpress/element"

registerBlockType("blocktheme/slide", {
  title: "Slide",
  supports: {
    align: ["full"]
  },
  attributes: {
    themeimage: { type: "string" },
    align: { type: "string", default: "full" },
    imgID: { type: "number" },
    imgURL: { type: "string", default: slide.fallbackimage }
  },
  edit: EditComponent,
  save: SaveComponent
})

function EditComponent(props) {
  useEffect(function () {
    if (props.attributes.themeimage) {
      props.setAttributes({ imgURL: `${slide.themeimagepath}${props.attributes.themeimage}` })
    }
  }, [])

  useEffect(
    function () {
      if (props.attributes.imgID) {
        async function go() {
          const response = await apiFetch({
            path: `/wp/v2/media/${props.attributes.imgID}`,
            method: "GET"
          })
          props.setAttributes({ themeimage: "", imgURL: response.media_details.sizes.full.source_url })
        }
        go()
      }
    },
    [props.attributes.imgID]
  )

  function onFileSelect(x) {
    props.setAttributes({ imgID: x.id })
  }

  return (
    <>
      <InspectorControls>
        <PanelBody title="Background" initialOpen={true}>
          <PanelRow>
            <MediaUploadCheck>
              <MediaUpload
                onSelect={onFileSelect}
                value={props.attributes.imgID}
                render={({ open }) => {
                  return <Button onClick={open}>Choose Image</Button>
                }}
              />
            </MediaUploadCheck>
          </PanelRow>
        </PanelBody>
      </InspectorControls>

     <div class="container-fluid">
      <div class="row">
        <div class="col-12">
        <img src={props.attributes.imgURL} class="img-fluid" width="100%" />
          <div class="carousel-caption" style={ { marginBottom: '150px' } }>
               <InnerBlocks allowedBlocks={ [ 'core/heading' ] } />
          </div>
        </div>
      </div>
     </div>
    </>
  )
}

function SaveComponent() {
  return <InnerBlocks.Content />
}
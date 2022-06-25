wp.blocks.registerBlockType('blocktheme/staticblock', {
     title: 'Static Block',
     attributes: {
         dynamicText: {
             type: 'string'
         },
     },
     edit: (props) => {
         function changeDynamicText(event) {
             props.setAttributes({
                 dynamicText: event.target.value
             })
         }
         return (
             <>
             <input type="text" placeholder="dynamic text" value = {props.attributes.dynamicText} onChange = {changeDynamicText}/>
             </>
         )
     },
     save: (props) => {
         return <p>The dynamic text was {props.attributes.dynamicText}.</p>
     },
    //  deprecated: [{
    //     save: (props) => {
    //         return <p>The dynamic text was {props.attributes.dynamicText}.</p>
    //     },
    //     attributes: {
    //         dynamicText: {
    //             type: 'string'
    //     },
    //  }}]
 }) 
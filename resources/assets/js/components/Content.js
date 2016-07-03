var React                 = require('react');
var ContentStore          = require('../stores/ContentStore');
var classNames            = require('classnames');
var Paragraph             = require('./Paragraph');
// var Modal                 = require('react-modal');
var ContentActionCreators = require('../actions/ContentActionCreators');
//ScaleModal DropModal OutlineModal FadeModal FlyModal WaveModal
//demo:   http://madscript.com/boron/
//github: https://github.com/yuanyan/boron
var Modal = require('boron/DropModal');
// var Content = React.createClass({
//     showModal: function(){
//         this.refs.modal.show();
//     },
//     hideModal: function(){
//         this.refs.modal.hide();
//     },
//     render: function() {
//         return (
//             <div>
//                 <button onClick={this.showModal}>Open</button>
//                 <Modal ref="modal">
//                     <h2>I am a dialog</h2>
//                     <button onClick={this.hideModal}>Close</button>
//                 </Modal>
//             </div>
//         );
//     }
// });

// const customStyles = {
//   content : {
//     top                   : '50%',
//     left                  : '50%',
//     right                 : 'auto',
//     bottom                : 'auto',
//     marginRight           : '-50%',
//     transform             : 'translate(-50%, -50%)',
//     width                 : '60%',
//   }
// };

function getStateFromStore(){
    return {contentObj: ContentStore.getContent()};
}

var Content = React.createClass({
        
        getInitialState() {
            return {
                contentObj:  {content: ''},
                modalIsOpen: false
            };
        },

        componentDidMount() {
            ContentStore.addChangeListener(this._onChange);
        },

        openModal: function() {
            this.refs.modal.show();
        },

        afterOpenModal: function() {

        },

        closeModal: function() {
            this.refs.modal.hide();
        },

        render(){

            return(
                <div>
                    <Modal
                      ref="modal"
                      >

                        <Paragraph data={this.state.contentObj.content} />

                    </Modal>
                </div>
            );
        },

        _onChange(){
            this.setState(getStateFromStore());
            this.openModal();
        },
    });

// var Content = React.createClass({
        
//         getInitialState() {
//             return {
//                 contentObj:  {content: ''},
//                 modalIsOpen: false
//             };
//         },

//         componentDidMount() {
//             ContentStore.addChangeListener(this._onChange);
//         },

//         openModal: function() {
//             this.setState({
//                 modalIsOpen: true,
//                 originalBodyOverflow: document.body.style.overflow
//             });

//             document.body.style.overflow = 'hidden';
//         },

//         afterOpenModal: function() {

//         },

//         closeModal: function() {
//             this.setState({modalIsOpen: false});
//             document.body.style.overflow = this.state.originalBodyOverflow;
//         },

//         render(){

//             // extend default css
//             Modal.defaultStyles.content.top             = '1%';
//             Modal.defaultStyles.content.bottom          = '1%';
//             Modal.defaultStyles.content.left            = '7%';
//             Modal.defaultStyles.content.right           = '7%';
//             Modal.defaultStyles.overlay.backgroundColor = "rgba(0, 0, 0, 0.75)"

//             /*
//              * read out default css value
//              */
//             // console.log(Modal.defaultStyles.content);
//             // console.log(Modal.defaultStyles.overlay);

//             return(
//                 <div>
//                     <Modal
//                       isOpen={this.state.modalIsOpen}
//                       onAfterOpen={this.afterOpenModal}
//                       onRequestClose={this.closeModal}
//                       // style={customStyles}
//                       >

//                         <Paragraph data={this.state.contentObj.content} />

//                     </Modal>
//                 </div>
//             );
//         },

//         _onChange(){
//             this.setState(getStateFromStore());
//             this.openModal();
//         },
//     });

module.exports = Content;
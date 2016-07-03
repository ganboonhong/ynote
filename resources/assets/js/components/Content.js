var React                 = require('react');
var ContentStore          = require('../stores/ContentStore');
var classNames            = require('classnames');
var Paragraph             = require('./Paragraph');
// var Modal                 = require('react-modal');
var ContentActionCreators = require('../actions/ContentActionCreators');
//ScaleModal DropModal OutlineModal FadeModal FlyModal WaveModal
//demo:   http://madscript.com/boron/
//github: https://github.com/yuanyan/boron
var Modal = require('boron/WaveModal');
var modalStyle = {
        width: '90%',
        height: '100%',
        position: 'fixed',
        marginTop: '20px',
    };

var contentStyle = {
    overflow: 'auto',
    height: window.innerHeight - 50,
    borderTopLeftRadius: '15px',
    borderBottomLeftRadius: '15px',
    marginBottom: '200px',
};

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

        showModal: function() {
            console.log(window.innerHeight);
            this.refs.modal.show();
            document.body.style.overflow = 'hidden';
            
        },

        hideModal: function() {
            console.log('closed');
            this.refs.modal.hide();
            document.body.style.overflow = 'visible';
        },


        render(){

            return(
                <div>
                    <Modal
                      ref="modal"
                      modalStyle={modalStyle}
                      contentStyle={contentStyle}
                      onHide={this.hideModal}
                      >
                        <Paragraph data={this.state.contentObj.content} />

                    </Modal>
                </div>
            );
        },

        _onChange(){
            this.setState(getStateFromStore());
            this.showModal();
        },
    });

module.exports = Content;
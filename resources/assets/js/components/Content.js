var React        = require('react');
var ContentStore = require('../stores/ContentStore');
var classNames   = require('classnames');
var Paragraph    = require('./Paragraph');

function getStateFromStore(){
    return {contentObj: ContentStore.getContent()};
}

var Content = React.createClass({
        
        getInitialState() {
            return {
                contentObj: {content: ''}
            };
        },

        componentDidMount() {
            ContentStore.addChangeListener(this._onChange);
        },

        render(){
            var coverClass = classNames({
                'hide':  (this.state.contentObj.content == ''),
                'cover': true,
            });

            return(
                <div className={coverClass}>
                    <Paragraph data={this.state.contentObj.content} />
                </div>
            );
        },

        _onChange(){
            console.log("Content::_onChange");
            console.log(ContentStore.getContent());
            this.setState(getStateFromStore());
        }
    });

module.exports = Content;
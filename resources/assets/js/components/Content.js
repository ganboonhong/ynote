var React        = require('react');
var ContentStore = require('../stores/ContentStore');
var classNames   = require('classnames');

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
                'cover': (this.state.contentObj.content != ''),
            });

            return(
                <div className={coverClass}>
                    {this.state.contentObj.content}
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
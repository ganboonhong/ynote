var React = require('react');

var Paragraph = React.createClass({
        render() {
            return (
                <div className="center">
                    <p dangerouslySetInnerHTML={{__html: this.props.data}}></p>
                </div>
            );
        }
    });

module.exports = Paragraph;
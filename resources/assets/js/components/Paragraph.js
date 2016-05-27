var React = require('react');

var Paragraph = React.createClass({
        render() {
            return (
                <div className="center">
                    <p id="paragraph" dangerouslySetInnerHTML={{__html: this.props.data}}>
                    </p>
                </div>
            );
        }
    });

    module.exports = Paragraph;
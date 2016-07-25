var React = require('react');

var Paragraph = React.createClass({
        getDefaultProps: function(){
            return {
                data: 'No Article Found.'
            };
        },

        render() {
            return (
                <div className="center">
                    <p dangerouslySetInnerHTML={{__html: this.props.data}}></p>
                </div>
            );
        }
    });

Paragraph.propTypes = {data: React.PropTypes.string};

module.exports = Paragraph;
var React              = require('react');
var BlogActionCreators = require('../actions/BlogActionCreators');

var Blog = React.createClass({

        render() {
            var data = this.props.data;

            return (
                <div className="list-item-container">
                    
                        <div className="col-md-4 col-sm-5 col-xs-12 item">
                            <a onClick={this._onClick} className="finger">
                                <img src={'/server/php/files/'+data.list_pic} className="list-pics" />
                            </a>
                            <a className="finger" onClick={this._onClick}>
                                <p className="title">{data.title}</p>
                            </a>
                        </div>
                    
                </div>
            );
        },

        _onClick(){
            BlogActionCreators.clickBlog(this.props.data.content);
        },

    });

module.exports = Blog;
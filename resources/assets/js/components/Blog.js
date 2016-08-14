var React              = require('react');
var BlogActionCreators = require('../actions/BlogActionCreators');
var ContentStore       = require('../stores/ContentStore');

var Blog = React.createClass({

        render() {
            var data = this.props.data;
            // var pic_url;

            // if(data.cloudinary_api_response){
            //     var cloudinary_api_response = JSON.parse(data.cloudinary_api_response);
            //     pic_url = cloudinary_api_response.secure_url;
            // }

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
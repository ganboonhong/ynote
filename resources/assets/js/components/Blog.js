var React = require('react');

var Blog = React.createClass({
        render() {
            var data = this.props.data;
            var pic_url;

            if(data.cloudinary_api_response){
                var cloudinary_api_response = JSON.parse(data.cloudinary_api_response);
                pic_url = cloudinary_api_response.secure_url;
            }

            return (
                <div className="list-item-container">
                    
                        <div className="col-md-4 col-sm-5 col-xs-12 item">
                            <a>
                                <img src={pic_url} className="list-pics" />
                            </a>
                            <a>
                                <p className="title">{data.title}</p>
                            </a>
                        </div>
                    
                </div>
            );
        }
    });

module.exports = Blog;
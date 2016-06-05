import $ from "jQuery";
var React         = require('react');
var Nav           = require('./Nav');
var BlogContainer = require('./BlogContainer');
var Content       = require('./Content');
var BlogPageStore = require('../stores/BlogPageStore');

var BlogPage = React.createClass({
    componentWillMount() {
        BlogPageStore.setUrlParams(this.props.params);
    },
    render() {
        var url_params = BlogPageStore.getUrlParams();

        // $.extend({
        //     getValues: function(){
        //         var navData = null;
        //         $.getJSON(

        //             "/" + url_params.user_id + "/article/",

        //             { isNavBar: true },

        //             function (data) {
        //                 navData = data;
        //                 console.log(navData);
        //             }
        //         );

        //         return navData;
        //     }
        // })

        var navData;

        $.ajax({
            async: false,
            url: "/" + url_params.user_id + "/article/",
            data: { isNavBar: true},
            dataType: 'json',
            success: function(data){
                navData = data;
            }
        });

        console.log(navData);

        return (
            <div>
                <Content/>
                <Nav navData={navData}/>
                <BlogContainer/>
            </div>
        );
    }
});

module.exports = BlogPage;
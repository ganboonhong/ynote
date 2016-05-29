import { Router, Route, IndexRoute, Link, IndexLink, browserHistory, hashHistory } from 'react-router'
var React       = require("react");
var ReactDOM    = require("react-dom");
var TestApp     = require("./components/TestApp");
var BlogPage    = require("./components/BlogPage");
var About       = require("./components/About");
var Nav         = require("./components/Nav");
var WebAPIUtils = require("./utils/WebAPIUtils");

WebAPIUtils.init();

var App = React.createClass({
    render() {
        return (
          <div>
            {this.props.children}
          </div>
        );
    }

});

ReactDOM.render(

  <Router history={hashHistory}>
    <Route path="/about" component={About} />
    <Route path="/" component={App}>
        <IndexRoute component={BlogPage}>
        <Route path="/blog_nav_bar" component={Nav} />
        </IndexRoute>
    </Route>
  </Router>,

  document.getElementById("container")
  
);
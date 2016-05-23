import { render } from "react-dom";
import { Router, Route, IndexRoute, Link, IndexLink, browserHistory } from 'react-router'
var React       = require("react");
var TestApp     = require("./components/TestApp");
var BlogPage    = require("./components/BlogPage");
var About       = require("./components/About");
var Nav         = require("./components/Nav");
var WebAPIUtils = require("./utils/WebAPIUtils");

const containerEl = document.getElementById("container");
var pathArray     = window.location.pathname.split('/');
var id            = pathArray[2];

WebAPIUtils.init();

var App = React.createClass({

    render: function() {
        return (
          <div>
            {this.props.children}
          </div>
        );
    }

});

render(
  <Router history={browserHistory}>
    <Route path="/" component={App}>
        <IndexRoute component={BlogPage} />
        <Route path="/about" component={About} />
        <Route path="/blog/2" component={BlogPage} />
        <Route path="/blog_nav_bar" component={Nav} />
    </Route>
  </Router>,
  containerEl
);
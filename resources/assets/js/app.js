import { render } from "react-dom";
import { Router, Route, IndexRoute, Link, IndexLink, browserHistory } from 'react-router'
import React from "react";
import TestApp from "./components/TestApp";
import BlogPage from "./components/BlogPage";
import About from "./components/About";
import BlogNavBar from "./components/BlogNavBar";

const containerEl = document.getElementById("container");

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
        <Route path="/blog" component={BlogPage} />
        <Route path="/blog_nav_bar" component={BlogNavBar} />
    </Route>
  </Router>,
  containerEl
);
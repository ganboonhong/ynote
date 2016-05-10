import { render } from "react-dom";
import { Router, Route, IndexRoute} from "react-router";
import React from "react";
import TestApp from "./TestApp";
import Hello from "./Hello";
import About from "./About";

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
  <Router>
    <Route path="/" component={App}>
        <IndexRoute component={Hello} />
        <Route path="about" component={About} />
    </Route>
  </Router>,
  containerEl
);
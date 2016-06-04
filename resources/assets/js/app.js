import { Router, Route, IndexRoute, Link, IndexLink, browserHistory } from 'react-router'
var React       = require("react");
var ReactDOM    = require("react-dom");
var BlogPage    = require("./components/BlogPage");
var About       = require("./components/About");
var NotFound       = require("./components/NotFound");

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

  <Router history={browserHistory}>
    <Route path="/about" component={About} />
    <Route path="/" component={App}>
        <IndexRoute component={About} />
        <Route path="/blog/:user_id/:article_id/:preview" component={BlogPage} />
        <Route path="*" component={NotFound} />
    </Route>
  </Router>,

  document.getElementById("container")
  
);
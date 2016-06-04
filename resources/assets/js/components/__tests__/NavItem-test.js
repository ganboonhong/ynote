jest.unmock('../NavItem.js');
var NavItem = require('../NavItem.js');
import React from 'react';
import ReactDOM from 'react-dom';
import TestUtils from 'react-addons-test-utils';
import { renderIntoDocument, findRenderedDOMComponentWithClass } from 'react-addons-test-utils';
import { findDOMNode } from 'react-dom';

const renderer = TestUtils.createRenderer();

    function mount(Component, props) {
        return renderIntoDocument(<Component { ...props } />);
    }

    function shallow(Component, props) {
        renderer.render(<Component {...props} />);
        return renderer.getRenderOutput();
    }

describe('NavItem Component', () => {

    it("has a root tag of <a>", function(){

        const result = shallow(NavItem, {data: {name: 'foo', total: '10'}});

        expect(result.type).toBe('a');
        expect(result.props.children.type).toBe('li');
        expect(result.props.children.props.children.type).toBe('span');

    });
});


describe('the simplest way to test a react component', () => {
    it ('mount should render a simple component', () => {
        let component = mount(NavItem, {data: {name: 'foo', total: '10'}});
        let node = findDOMNode(component);
        // let node = findRenderedDOMComponentWithClass(component, 'category'); // find node by class
        expect(node.textContent).toEqual('foo ( 10 )')
    });
});

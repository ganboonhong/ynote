jest.unmock('../NavItem.js');
var NavItem = require('../NavItem.js');
import React from 'react';
import ReactDOM from 'react-dom';
import TestUtils from 'react-addons-test-utils';
import { renderIntoDocument, findRenderedDOMComponentWithClass } from 'react-addons-test-utils';
import { findDOMNode } from 'react-dom';

const renderer = TestUtils.createRenderer();
const testData = {  data: {name: 'foo', total: '10'}, 
                    category_class: 'finger category',
                    text_class: 'category-name'
                    };

function mount(Component, props) {
    return renderIntoDocument(<Component { ...props } />);
}

function shallow(Component, props) {
    renderer.render(<Component {...props} />);
    return renderer.getRenderOutput();
}

describe('NavItem Component', () => {

    it("has a root tag of <li>", function(){

        const result = shallow(NavItem, testData);

        expect(result.type).toBe('li');
        expect(result.props.children.type).toBe('span');

    });

    it ('mount should render a simple component', () => {
        let component = mount(NavItem, testData);
        let node = findDOMNode(component);
        // let node = findRenderedDOMComponentWithClass(component, 'category'); // find node by class
        expect(node.textContent).toEqual('foo ( 10 )')
    });

    // it ('should simulate a click', () => {
    //     let component = mount(NavItem, testData);
    //     let node      = findDOMNode(component);

    //     TestUtils.Simulate.click(node);

    //     expect(node.className).toBe(0)

    // });

});



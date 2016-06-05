jest.unmock('../Paragraph.js');
var Paragraph = require('../Paragraph.js');
import React from 'react';
import ReactDOM from 'react-dom';
import TestUtils from 'react-addons-test-utils';
import { renderIntoDocument, findRenderedDOMComponentWithClass } from 'react-addons-test-utils';
import { findDOMNode } from 'react-dom';

const renderer = TestUtils.createRenderer();
const testData = {  data: '<p>A paragraph tag</p>'};

function mount(Component, props) {
    return renderIntoDocument(<Component { ...props } />);
}

function shallow(Component, props) {
    renderer.render(<Component {...props} />);
    return renderer.getRenderOutput();
}

describe('Paragraph Component', () => {

    it("has a root tag of <div>", function(){

        const result = shallow(Paragraph, testData);

        expect(result.type).toBe('div');
        expect(result.props.children.type).toBe('p');

    });

    it ('mount should render a simple component', () => {
        let component = mount(Paragraph, testData);
        let node = findDOMNode(component);
        
        expect(node.textContent).toEqual('A paragraph tag')
    });

});



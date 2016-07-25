jest
.unmock('../Nav.js')
.unmock('../NavItem.js')
.unmock('object-assign');

var Nav = require('../Nav.js');
import React from 'react';
import ReactDOM from 'react-dom';
import TestUtils from 'react-addons-test-utils';
import { 
    renderIntoDocument, 
    findRenderedDOMComponentWithClass,
    scryRenderedDOMComponentsWithClass as findByClass } from 'react-addons-test-utils';
import { findDOMNode } from 'react-dom';

const renderer = TestUtils.createRenderer();
const testData = {navData:{"categories":[{"category_id":"12","name":"Food","name_en":"Food","sort":"0","user_id":"2","created_at":"-0001-11-30 00:00:00","updated_at":"-0001-11-30 00:00:00","total":2},{"category_id":"42","name":"Go Green","name_en":"Go Green","sort":"0","user_id":"2","created_at":"-0001-11-30 00:00:00","updated_at":"-0001-11-30 00:00:00","total":1},{"category_id":"32","name":"Life","name_en":"Life","sort":"0","user_id":"2","created_at":"-0001-11-30 00:00:00","updated_at":"-0001-11-30 00:00:00","total":1},{"category_id":"2","name":"Programming","name_en":"Programming","sort":"0","user_id":"2","created_at":"-0001-11-30 00:00:00","updated_at":"-0001-11-30 00:00:00","total":3},{"category_id":"22","name":"Travelling","name_en":"Travelling","sort":"0","user_id":"2","created_at":"-0001-11-30 00:00:00","updated_at":"-0001-11-30 00:00:00","total":1}],"user":{"user_id":"2","name":"Francis","email":"ganboonhong@gmail.com","created_at":"2016-01-24 01:08:27","updated_at":"2016-06-04 17:29:59","pic":"642340.JPG","cloudinary_api_response":"{\"public_id\":\"642340\",\"version\":1453548823,\"signature\":\"c4958a41fbd64d2e25aaa029febdab830ebddc37\",\"width\":841,\"height\":1160,\"format\":\"jpg\",\"resource_type\":\"image\",\"created_at\":\"2016-01-23T11:33:43Z\",\"tags\":[\"basic_sample\"],\"bytes\":414835,\"type\":\"upload\",\"etag\":\"ab7f1b3d49d7c0a77fc4bc172243ac36\",\"url\":\"http:\\/\\/res.cloudinary.com\\/hrm4jb60z\\/image\\/upload\\/v1453548823\\/642340.jpg\",\"secure_url\":\"https:\\/\\/res.cloudinary.com\\/hrm4jb60z\\/image\\/upload\\/v1453548823\\/642340.jpg\",\"original_filename\":\"642340\"}","description":"Stay hungry, stay foolish.","level":"100","last_login":"2016-06-04 17:29:59"},"article_amount":{"2":3,"12":2,"22":1,"32":1,"42":1,"total":8}}};

function mount(Component, props) {
    return renderIntoDocument(<Component { ...props } />);
}

function shallow(Component, props) {
    renderer.render(<Component {...props} />);
    return renderer.getRenderOutput();
}

describe('Nav Component', () => {

    it ('mount should render a simple component', () => {
        let component = mount(Nav, testData);
        let node = findDOMNode(component);
        // let node = findRenderedDOMComponentWithClass(component, 'category'); // find node by class
        expect(findByClass(component, 'category').length).toEqual(6)
    });

});



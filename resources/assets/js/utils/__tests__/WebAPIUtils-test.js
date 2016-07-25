jest.dontMock('../WebAPIUtils');

describe('WebAPIUtils module', function(){
    var WebAPIUtils = require('../WebAPIUtils');
    var expectedValue = WebAPIUtils.init(2);

    it('returns 2 times of inserted value', function(){
        expect(4).toEqual(expectedValue);
    });
}

);
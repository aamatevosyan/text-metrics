const path = require('path');

module.exports = {
    resolve: {
        alias: {
            '@front': path.resolve('resources/front/js'),
            '@assetsFront': path.resolve('resources/front/assets'),
        },
    },
};

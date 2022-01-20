const path = require('path');

module.exports = {
    resolve: {
        alias: {
            '@shared': path.resolve('resources/shared/js'),
            '@assetsShared': path.resolve('resources/shared/assets'),
        },
    },
};

const path = require('path');

module.exports = {
    resolve: {
        alias: {
            '@supervisor': path.resolve('resources/supervisor/js'),
            '@assetsSupervisor': path.resolve('resources/supervisor/assets'),
        },
    },
};

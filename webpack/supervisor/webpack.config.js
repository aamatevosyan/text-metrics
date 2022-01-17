const path = require('path');

module.exports = {
    resolve: {
        alias: {
            '@supervisor': path.resolve('resources/js/supervisor'),
            '@assetsSupervisor': path.resolve('resources/assets/supervisor'),
        },
    },
};

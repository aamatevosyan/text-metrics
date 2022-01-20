const path = require('path');

module.exports = {
    resolve: {
        alias: {
            '@admin': path.resolve('resources/admin/js'),
            '@assetsAdmin': path.resolve('resources/admin/assets'),
        },
    },
};

const path = require('path');

module.exports = {
  resolve: {
    alias: {
      '@admin': path.resolve('resources/js/admin'),
      '@assetsAdmin': path.resolve('resources/assets/admin'),
    },
  },
};

const path = require('path');

module.exports = {
  resolve: {
    alias: {
      '@front': path.resolve('resources/js/front'),
      '@assetsFront': path.resolve('resources/assets/front'),
    },
  },
};

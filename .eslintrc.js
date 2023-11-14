module.exports = {
  extends: [
    'eslint:recommended',
    'standard',
  ],
  env: {
    browser: true,
  },
  globals: {
    jQuery: true,
    Swiper: true,
    acf: true,
    bodyScrollLock: true,
  },
  rules: {
    'comma-dangle': [
      'error', {
        arrays: 'always-multiline',
        objects: 'always-multiline',
        imports: 'never',
        exports: 'never',
        functions: 'never',
      },
    ],
    'no-cond-assign': ['error', 'except-parens'],
  },
}

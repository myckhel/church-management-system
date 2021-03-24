import React, { useState, useMemo } from 'react';
import Helmet from 'react-helmet';
import { InertiaLink } from '@inertiajs/inertia-react';
import { useForm, usePage } from '@inertiajs/inertia-react';

export default () => {
  const { url } = usePage();
  // const [title] = useState('Login')
  const { title, isLogin } = useMemo(() => {
    const page = url.split('/')[1];
    return {
      title: capitalize(page),
      isLogin: page === 'login'
    };
  }, [url]);
  const { errors, setData, post } = useForm({
    password: '',
    password_confirmation: '',
    email: '',
    remember: ''
  });

  function submit(e) {
    e.preventDefault();
    post(url);
  }

  return (
    <div className="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
      <Helmet titleTemplate="%s | CMS" title={title} />
      <div className="max-w-md w-full space-y-8">
        <div>
          <img
            className="mx-auto h-12 w-auto"
            src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
            alt="Workflow"
          />
          <h2 className="mt-6 text-center text-3xl font-extrabold text-gray-900">
            {isLogin ? 'Sign in to your account' : 'Signup a new account'}
          </h2>
          <p className="mt-2 text-center text-sm text-gray-600">
            Or
            <InertiaLink
              href={route(isLogin ? 'register' : 'login')}
              className="font-medium text-indigo-600 hover:text-indigo-500"
            >
              {isLogin ? 'Register' : 'Login'}
            </InertiaLink>
          </p>
        </div>
        <form onSubmit={submit} className="mt-8 space-y-6">
          <input type="hidden" name="remember" value="true" />
          <div className="rounded-md shadow-sm -space-y-px">
            <div>
              <label htmlFor="email-address" className="sr-only">
                Email address
              </label>
              <input
                id="email"
                type="email"
                onChange={e => setData('email', e.target.value)}
                className="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                name="email"
                required
                autoComplete="email"
                placeholder="Email address"
                autoFocus
              />

              {errors.email && (
                <span className="ring-red-50" role="alert">
                  <strong>{errors.email}</strong>
                </span>
              )}
            </div>
            <div>
              <label htmlFor="password" className="sr-only">
                Password
              </label>
              <input
                id="password"
                type="password"
                onChange={e => setData('password', e.target.value)}
                className="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                name="password"
                required
                autoComplete="current-password"
                placeholder="Password"
              />

              {errors.password && (
                <span className="ring-red-50" role="alert">
                  <strong>{errors.password}</strong>
                </span>
              )}
            </div>
            <div>
              <label htmlFor="password_confirmation" className="sr-only">
                Confirm Password
              </label>
              <input
                id="password_confirmation"
                type="password"
                onChange={e => setData('password_confirmation', e.target.value)}
                className="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                name="password"
                required
                placeholder="Confirm password"
              />

              {errors.password_confirmation && (
                <span className="ring-red-50" role="alert">
                  <strong>{errors.password_confirmation}</strong>
                </span>
              )}
            </div>
          </div>

          <div className="flex items-center justify-between">
            <div className="flex items-center">
              <input
                type="checkbox"
                name="remember"
                id="remember"
                onChange={e => setData('remember', e.target.value)}
                className="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
              />
              <label
                htmlFor="remember_me"
                className="ml-2 block text-sm text-gray-900"
              >
                Remember me
              </label>
            </div>

            <div className="text-sm">
              {route().has('password.request') && (
                <InertiaLink
                  href={route('password.request')}
                  className="font-medium text-indigo-600 hover:text-indigo-500"
                >
                  Forgot your password?
                </InertiaLink>
              )}
            </div>
          </div>

          <div>
            <button
              type="submit"
              className="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
              <span className="absolute left-0 inset-y-0 flex items-center pl-3">
                <svg
                  className="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  aria-hidden="true"
                >
                  <path
                    fillRule="evenodd"
                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                    clipRule="evenodd"
                  />
                </svg>
              </span>
              {isLogin ? 'Sign in' : 'Sign up'}
            </button>
          </div>
        </form>
      </div>
    </div>
  );
};

const capitalize = s => {
  if (typeof s !== 'string') return '';
  return s.charAt(0).toUpperCase() + s.slice(1);
};

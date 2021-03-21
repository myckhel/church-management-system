import React from 'react';
import Helmet from 'react-helmet';
import { InertiaLink } from '@inertiajs/inertia-react';
import { useForm } from '@inertiajs/inertia-react';

export default () => {
  const {} = useForm({
    password: '',
    email: '',
    remember: ''
  });

  function submit(e) {
    e.preventDefault();
    post('/login');
  }

  return (
    <div className="container">
      <Helmet titleTemplate="%s | CMS" title={'Login'} />
      <div className="row justify-content-center">
        <div className="col-md-8">
          <div className="card">
            <div className="card-header">{'Login'}</div>

            <div className="card-body">
              <form onSubmit={submit}>
                <div className="form-group row">
                  <label
                    forHtml="email"
                    className="col-md-4 col-form-label text-md-right"
                  >
                    {'E-Mail Address'}
                  </label>

                  <div className="col-md-6">
                    <input
                      id="email"
                      type="email"
                      onChange={e => setData('email', e.target.value)}
                      className="form-control @error('email') is-invalid @enderror"
                      name="email"
                      value="{{ old('email') }}"
                      required
                      autoComplete="email"
                      autoFocus
                    />

                    {errors.email && (
                      <span className="invalid-feedback" role="alert">
                        <strong>{errors.email}</strong>
                      </span>
                    )}
                  </div>
                </div>

                <div className="form-group row">
                  <label
                    forHtml="password"
                    className="col-md-4 col-form-label text-md-right"
                  >
                    {'Password'}
                  </label>

                  <div className="col-md-6">
                    <input
                      id="password"
                      type="password"
                      onChange={e => setData('password', e.target.value)}
                      className="form-control @error('password') is-invalid @enderror"
                      name="password"
                      required
                      autoComplete="current-password"
                    />

                    {errors.password && (
                      <span className="invalid-feedback" role="alert">
                        <strong>{errors.password}</strong>
                      </span>
                    )}
                  </div>
                </div>

                <div className="form-group row">
                  <div className="col-md-6 offset-md-4">
                    <div className="form-check">
                      <input
                        className="form-check-input"
                        type="checkbox"
                        name="remember"
                        id="remember"
                        onChange={e => setData('remember', e.target.value)}
                      />

                      <label className="form-check-label" forHtml="remember">
                        {'Remember Me'}
                      </label>
                    </div>
                  </div>
                </div>

                <div className="form-group row mb-0">
                  <div className="col-md-8 offset-md-4">
                    <button type="submit" className="btn btn-primary">
                      {'Login'}
                    </button>
                    @if (Route::has('password.request'))
                    <a
                      className="btn btn-link"
                      href="{{ route('password.request') }}"
                    >
                      {'Forgot Your Password?'}
                    </a>
                    @endif
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

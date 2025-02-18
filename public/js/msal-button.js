const Hr = {
  uri: "https://msvc.sev.gob.mx/idsev/msal-support/api",
  validate: async (n, e, t, r) => {
    t = typeof t != "function" ? () => {
    } : t, r = typeof r != "function" ? () => {
    } : r;
    try {
      const i = await (await fetch(
        Hr.uri,
        {
          method: "POST",
          body: JSON.stringify({ User: n, Password: e }),
          headers: {
            "Content-Type": "application/json"
          }
        }
      )).json();
      t(i);
    } catch (o) {
      r(o);
    }
  }
};
/*! @azure/msal-browser v2.37.0 2023-05-01 */
/*! *****************************************************************************
Copyright (c) Microsoft Corporation.

Permission to use, copy, modify, and/or distribute this software for any
purpose with or without fee is hereby granted.

THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH
REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY
AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT,
INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM
LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR
OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR
PERFORMANCE OF THIS SOFTWARE.
***************************************************************************** */
var Lt = function(n, e) {
  return Lt = Object.setPrototypeOf || { __proto__: [] } instanceof Array && function(t, r) {
    t.__proto__ = r;
  } || function(t, r) {
    for (var o in r)
      Object.prototype.hasOwnProperty.call(r, o) && (t[o] = r[o]);
  }, Lt(n, e);
};
function X(n, e) {
  Lt(n, e);
  function t() {
    this.constructor = n;
  }
  n.prototype = e === null ? Object.create(e) : (t.prototype = e.prototype, new t());
}
var A = function() {
  return A = Object.assign || function(e) {
    for (var t, r = 1, o = arguments.length; r < o; r++) {
      t = arguments[r];
      for (var i in t)
        Object.prototype.hasOwnProperty.call(t, i) && (e[i] = t[i]);
    }
    return e;
  }, A.apply(this, arguments);
};
function ar(n, e) {
  var t = {};
  for (var r in n)
    Object.prototype.hasOwnProperty.call(n, r) && e.indexOf(r) < 0 && (t[r] = n[r]);
  if (n != null && typeof Object.getOwnPropertySymbols == "function")
    for (var o = 0, r = Object.getOwnPropertySymbols(n); o < r.length; o++)
      e.indexOf(r[o]) < 0 && Object.prototype.propertyIsEnumerable.call(n, r[o]) && (t[r[o]] = n[r[o]]);
  return t;
}
function v(n, e, t, r) {
  function o(i) {
    return i instanceof t ? i : new t(function(a) {
      a(i);
    });
  }
  return new (t || (t = Promise))(function(i, a) {
    function s(l) {
      try {
        u(r.next(l));
      } catch (d) {
        a(d);
      }
    }
    function c(l) {
      try {
        u(r.throw(l));
      } catch (d) {
        a(d);
      }
    }
    function u(l) {
      l.done ? i(l.value) : o(l.value).then(s, c);
    }
    u((r = r.apply(n, e || [])).next());
  });
}
function y(n, e) {
  var t = { label: 0, sent: function() {
    if (i[0] & 1)
      throw i[1];
    return i[1];
  }, trys: [], ops: [] }, r, o, i, a;
  return a = { next: s(0), throw: s(1), return: s(2) }, typeof Symbol == "function" && (a[Symbol.iterator] = function() {
    return this;
  }), a;
  function s(u) {
    return function(l) {
      return c([u, l]);
    };
  }
  function c(u) {
    if (r)
      throw new TypeError("Generator is already executing.");
    for (; t; )
      try {
        if (r = 1, o && (i = u[0] & 2 ? o.return : u[0] ? o.throw || ((i = o.return) && i.call(o), 0) : o.next) && !(i = i.call(o, u[1])).done)
          return i;
        switch (o = 0, i && (u = [u[0] & 2, i.value]), u[0]) {
          case 0:
          case 1:
            i = u;
            break;
          case 4:
            return t.label++, { value: u[1], done: !1 };
          case 5:
            t.label++, o = u[1], u = [0];
            continue;
          case 7:
            u = t.ops.pop(), t.trys.pop();
            continue;
          default:
            if (i = t.trys, !(i = i.length > 0 && i[i.length - 1]) && (u[0] === 6 || u[0] === 2)) {
              t = 0;
              continue;
            }
            if (u[0] === 3 && (!i || u[1] > i[0] && u[1] < i[3])) {
              t.label = u[1];
              break;
            }
            if (u[0] === 6 && t.label < i[1]) {
              t.label = i[1], i = u;
              break;
            }
            if (i && t.label < i[2]) {
              t.label = i[2], t.ops.push(u);
              break;
            }
            i[2] && t.ops.pop(), t.trys.pop();
            continue;
        }
        u = e.call(n, t);
      } catch (l) {
        u = [6, l], o = 0;
      } finally {
        r = i = 0;
      }
    if (u[0] & 5)
      throw u[1];
    return { value: u[0] ? u[1] : void 0, done: !0 };
  }
}
function en(n, e) {
  var t = typeof Symbol == "function" && n[Symbol.iterator];
  if (!t)
    return n;
  var r = t.call(n), o, i = [], a;
  try {
    for (; (e === void 0 || e-- > 0) && !(o = r.next()).done; )
      i.push(o.value);
  } catch (s) {
    a = { error: s };
  } finally {
    try {
      o && !o.done && (t = r.return) && t.call(r);
    } finally {
      if (a)
        throw a.error;
    }
  }
  return i;
}
function Jt() {
  for (var n = [], e = 0; e < arguments.length; e++)
    n = n.concat(en(arguments[e]));
  return n;
}
/*! @azure/msal-common v13.0.0 2023-05-01 */
/*! *****************************************************************************
Copyright (c) Microsoft Corporation.

Permission to use, copy, modify, and/or distribute this software for any
purpose with or without fee is hereby granted.

THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH
REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY
AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT,
INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM
LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR
OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR
PERFORMANCE OF THIS SOFTWARE.
***************************************************************************** */
var Dt = function(n, e) {
  return Dt = Object.setPrototypeOf || { __proto__: [] } instanceof Array && function(t, r) {
    t.__proto__ = r;
  } || function(t, r) {
    for (var o in r)
      Object.prototype.hasOwnProperty.call(r, o) && (t[o] = r[o]);
  }, Dt(n, e);
};
function ue(n, e) {
  Dt(n, e);
  function t() {
    this.constructor = n;
  }
  n.prototype = e === null ? Object.create(e) : (t.prototype = e.prototype, new t());
}
var B = function() {
  return B = Object.assign || function(e) {
    for (var t, r = 1, o = arguments.length; r < o; r++) {
      t = arguments[r];
      for (var i in t)
        Object.prototype.hasOwnProperty.call(t, i) && (e[i] = t[i]);
    }
    return e;
  }, B.apply(this, arguments);
};
function O(n, e, t, r) {
  function o(i) {
    return i instanceof t ? i : new t(function(a) {
      a(i);
    });
  }
  return new (t || (t = Promise))(function(i, a) {
    function s(l) {
      try {
        u(r.next(l));
      } catch (d) {
        a(d);
      }
    }
    function c(l) {
      try {
        u(r.throw(l));
      } catch (d) {
        a(d);
      }
    }
    function u(l) {
      l.done ? i(l.value) : o(l.value).then(s, c);
    }
    u((r = r.apply(n, e || [])).next());
  });
}
function U(n, e) {
  var t = { label: 0, sent: function() {
    if (i[0] & 1)
      throw i[1];
    return i[1];
  }, trys: [], ops: [] }, r, o, i, a;
  return a = { next: s(0), throw: s(1), return: s(2) }, typeof Symbol == "function" && (a[Symbol.iterator] = function() {
    return this;
  }), a;
  function s(u) {
    return function(l) {
      return c([u, l]);
    };
  }
  function c(u) {
    if (r)
      throw new TypeError("Generator is already executing.");
    for (; t; )
      try {
        if (r = 1, o && (i = u[0] & 2 ? o.return : u[0] ? o.throw || ((i = o.return) && i.call(o), 0) : o.next) && !(i = i.call(o, u[1])).done)
          return i;
        switch (o = 0, i && (u = [u[0] & 2, i.value]), u[0]) {
          case 0:
          case 1:
            i = u;
            break;
          case 4:
            return t.label++, { value: u[1], done: !1 };
          case 5:
            t.label++, o = u[1], u = [0];
            continue;
          case 7:
            u = t.ops.pop(), t.trys.pop();
            continue;
          default:
            if (i = t.trys, !(i = i.length > 0 && i[i.length - 1]) && (u[0] === 6 || u[0] === 2)) {
              t = 0;
              continue;
            }
            if (u[0] === 3 && (!i || u[1] > i[0] && u[1] < i[3])) {
              t.label = u[1];
              break;
            }
            if (u[0] === 6 && t.label < i[1]) {
              t.label = i[1], i = u;
              break;
            }
            if (i && t.label < i[2]) {
              t.label = i[2], t.ops.push(u);
              break;
            }
            i[2] && t.ops.pop(), t.trys.pop();
            continue;
        }
        u = e.call(n, t);
      } catch (l) {
        u = [6, l], o = 0;
      } finally {
        r = i = 0;
      }
    if (u[0] & 5)
      throw u[1];
    return { value: u[0] ? u[1] : void 0, done: !0 };
  }
}
function Ot() {
  for (var n = 0, e = 0, t = arguments.length; e < t; e++)
    n += arguments[e].length;
  for (var r = Array(n), o = 0, e = 0; e < t; e++)
    for (var i = arguments[e], a = 0, s = i.length; a < s; a++, o++)
      r[o] = i[a];
  return r;
}
/*! @azure/msal-common v13.0.0 2023-05-01 */
var h = {
  LIBRARY_NAME: "MSAL.JS",
  SKU: "msal.js.common",
  // Prefix for all library cache entries
  CACHE_PREFIX: "msal",
  // default authority
  DEFAULT_AUTHORITY: "https://login.microsoftonline.com/common/",
  DEFAULT_AUTHORITY_HOST: "login.microsoftonline.com",
  DEFAULT_COMMON_TENANT: "common",
  // ADFS String
  ADFS: "adfs",
  DSTS: "dstsv2",
  // Default AAD Instance Discovery Endpoint
  AAD_INSTANCE_DISCOVERY_ENDPT: "https://login.microsoftonline.com/common/discovery/instance?api-version=1.1&authorization_endpoint=",
  // CIAM URL
  CIAM_AUTH_URL: ".ciamlogin.com",
  AAD_TENANT_DOMAIN_SUFFIX: ".onmicrosoft.com",
  // Resource delimiter - used for certain cache entries
  RESOURCE_DELIM: "|",
  // Placeholder for non-existent account ids/objects
  NO_ACCOUNT: "NO_ACCOUNT",
  // Claims
  CLAIMS: "claims",
  // Consumer UTID
  CONSUMER_UTID: "9188040d-6c67-4c5b-b112-36a304b66dad",
  // Default scopes
  OPENID_SCOPE: "openid",
  PROFILE_SCOPE: "profile",
  OFFLINE_ACCESS_SCOPE: "offline_access",
  EMAIL_SCOPE: "email",
  // Default response type for authorization code flow
  CODE_RESPONSE_TYPE: "code",
  CODE_GRANT_TYPE: "authorization_code",
  RT_GRANT_TYPE: "refresh_token",
  FRAGMENT_RESPONSE_MODE: "fragment",
  S256_CODE_CHALLENGE_METHOD: "S256",
  URL_FORM_CONTENT_TYPE: "application/x-www-form-urlencoded;charset=utf-8",
  AUTHORIZATION_PENDING: "authorization_pending",
  NOT_DEFINED: "not_defined",
  EMPTY_STRING: "",
  NOT_APPLICABLE: "N/A",
  FORWARD_SLASH: "/",
  IMDS_ENDPOINT: "http://169.254.169.254/metadata/instance/compute/location",
  IMDS_VERSION: "2020-06-01",
  IMDS_TIMEOUT: 2e3,
  AZURE_REGION_AUTO_DISCOVER_FLAG: "TryAutoDetect",
  REGIONAL_AUTH_PUBLIC_CLOUD_SUFFIX: "login.microsoft.com",
  REGIONAL_AUTH_NON_MSI_QUERY_STRING: "allowestsrnonmsi=true",
  KNOWN_PUBLIC_CLOUDS: ["login.microsoftonline.com", "login.windows.net", "login.microsoft.com", "sts.windows.net"],
  TOKEN_RESPONSE_TYPE: "token",
  ID_TOKEN_RESPONSE_TYPE: "id_token",
  SHR_NONCE_VALIDITY: 240,
  INVALID_INSTANCE: "invalid_instance"
}, pt = [
  h.OPENID_SCOPE,
  h.PROFILE_SCOPE,
  h.OFFLINE_ACCESS_SCOPE
], sr = Ot(pt, [
  h.EMAIL_SCOPE
]), he;
(function(n) {
  n.CONTENT_TYPE = "Content-Type", n.RETRY_AFTER = "Retry-After", n.CCS_HEADER = "X-AnchorMailbox", n.WWWAuthenticate = "WWW-Authenticate", n.AuthenticationInfo = "Authentication-Info", n.X_MS_REQUEST_ID = "x-ms-request-id", n.X_MS_HTTP_VERSION = "x-ms-httpver";
})(he || (he = {}));
var j;
(function(n) {
  n.ID_TOKEN = "idtoken", n.CLIENT_INFO = "client.info", n.ADAL_ID_TOKEN = "adal.idtoken", n.ERROR = "error", n.ERROR_DESC = "error.description", n.ACTIVE_ACCOUNT = "active-account", n.ACTIVE_ACCOUNT_FILTERS = "active-account-filters";
})(j || (j = {}));
var Ct;
(function(n) {
  n.COMMON = "common", n.ORGANIZATIONS = "organizations", n.CONSUMERS = "consumers";
})(Ct || (Ct = {}));
var L;
(function(n) {
  n.CLIENT_ID = "client_id", n.REDIRECT_URI = "redirect_uri", n.RESPONSE_TYPE = "response_type", n.RESPONSE_MODE = "response_mode", n.GRANT_TYPE = "grant_type", n.CLAIMS = "claims", n.SCOPE = "scope", n.ERROR = "error", n.ERROR_DESCRIPTION = "error_description", n.ACCESS_TOKEN = "access_token", n.ID_TOKEN = "id_token", n.REFRESH_TOKEN = "refresh_token", n.EXPIRES_IN = "expires_in", n.STATE = "state", n.NONCE = "nonce", n.PROMPT = "prompt", n.SESSION_STATE = "session_state", n.CLIENT_INFO = "client_info", n.CODE = "code", n.CODE_CHALLENGE = "code_challenge", n.CODE_CHALLENGE_METHOD = "code_challenge_method", n.CODE_VERIFIER = "code_verifier", n.CLIENT_REQUEST_ID = "client-request-id", n.X_CLIENT_SKU = "x-client-SKU", n.X_CLIENT_VER = "x-client-VER", n.X_CLIENT_OS = "x-client-OS", n.X_CLIENT_CPU = "x-client-CPU", n.X_CLIENT_CURR_TELEM = "x-client-current-telemetry", n.X_CLIENT_LAST_TELEM = "x-client-last-telemetry", n.X_MS_LIB_CAPABILITY = "x-ms-lib-capability", n.X_APP_NAME = "x-app-name", n.X_APP_VER = "x-app-ver", n.POST_LOGOUT_URI = "post_logout_redirect_uri", n.ID_TOKEN_HINT = "id_token_hint", n.DEVICE_CODE = "device_code", n.CLIENT_SECRET = "client_secret", n.CLIENT_ASSERTION = "client_assertion", n.CLIENT_ASSERTION_TYPE = "client_assertion_type", n.TOKEN_TYPE = "token_type", n.REQ_CNF = "req_cnf", n.OBO_ASSERTION = "assertion", n.REQUESTED_TOKEN_USE = "requested_token_use", n.ON_BEHALF_OF = "on_behalf_of", n.FOCI = "foci", n.CCS_HEADER = "X-AnchorMailbox", n.RETURN_SPA_CODE = "return_spa_code", n.NATIVE_BROKER = "nativebroker", n.LOGOUT_HINT = "logout_hint";
})(L || (L = {}));
var ze;
(function(n) {
  n.ACCESS_TOKEN = "access_token", n.XMS_CC = "xms_cc";
})(ze || (ze = {}));
var ee = {
  LOGIN: "login",
  SELECT_ACCOUNT: "select_account",
  CONSENT: "consent",
  NONE: "none",
  CREATE: "create",
  NO_SESSION: "no_session"
}, nt;
(function(n) {
  n.ACCOUNT = "account", n.SID = "sid", n.LOGIN_HINT = "login_hint", n.ID_TOKEN = "id_token", n.DOMAIN_HINT = "domain_hint", n.ORGANIZATIONS = "organizations", n.CONSUMERS = "consumers", n.ACCOUNT_ID = "accountIdentifier", n.HOMEACCOUNT_ID = "homeAccountIdentifier";
})(nt || (nt = {}));
var cr = {
  PLAIN: "plain",
  S256: "S256"
}, Et;
(function(n) {
  n.QUERY = "query", n.FRAGMENT = "fragment", n.FORM_POST = "form_post";
})(Et || (Et = {}));
var _t;
(function(n) {
  n.IMPLICIT_GRANT = "implicit", n.AUTHORIZATION_CODE_GRANT = "authorization_code", n.CLIENT_CREDENTIALS_GRANT = "client_credentials", n.RESOURCE_OWNER_PASSWORD_GRANT = "password", n.REFRESH_TOKEN_GRANT = "refresh_token", n.DEVICE_CODE_GRANT = "device_code", n.JWT_BEARER = "urn:ietf:params:oauth:grant-type:jwt-bearer";
})(_t || (_t = {}));
var Se;
(function(n) {
  n.MSSTS_ACCOUNT_TYPE = "MSSTS", n.ADFS_ACCOUNT_TYPE = "ADFS", n.MSAV1_ACCOUNT_TYPE = "MSA", n.GENERIC_ACCOUNT_TYPE = "Generic";
})(Se || (Se = {}));
var V;
(function(n) {
  n.CACHE_KEY_SEPARATOR = "-", n.CLIENT_INFO_SEPARATOR = ".";
})(V || (V = {}));
var M;
(function(n) {
  n.ID_TOKEN = "IdToken", n.ACCESS_TOKEN = "AccessToken", n.ACCESS_TOKEN_WITH_AUTH_SCHEME = "AccessToken_With_AuthScheme", n.REFRESH_TOKEN = "RefreshToken";
})(M || (M = {}));
var Ae;
(function(n) {
  n[n.ADFS = 1001] = "ADFS", n[n.MSA = 1002] = "MSA", n[n.MSSTS = 1003] = "MSSTS", n[n.GENERIC = 1004] = "GENERIC", n[n.ACCESS_TOKEN = 2001] = "ACCESS_TOKEN", n[n.REFRESH_TOKEN = 2002] = "REFRESH_TOKEN", n[n.ID_TOKEN = 2003] = "ID_TOKEN", n[n.APP_METADATA = 3001] = "APP_METADATA", n[n.UNDEFINED = 9999] = "UNDEFINED";
})(Ae || (Ae = {}));
var Ft = "appmetadata", tn = "client_info", ot = "1", it = {
  CACHE_KEY: "authority-metadata",
  REFRESH_TIME_SECONDS: 3600 * 24
  // 24 Hours
}, pe;
(function(n) {
  n.CONFIG = "config", n.CACHE = "cache", n.NETWORK = "network", n.HARDCODED_VALUES = "hardcoded_values";
})(pe || (pe = {}));
var W = {
  SCHEMA_VERSION: 5,
  MAX_CUR_HEADER_BYTES: 80,
  MAX_LAST_HEADER_BYTES: 330,
  MAX_CACHED_ERRORS: 50,
  CACHE_KEY: "server-telemetry",
  CATEGORY_SEPARATOR: "|",
  VALUE_SEPARATOR: ",",
  OVERFLOW_TRUE: "1",
  OVERFLOW_FALSE: "0",
  UNKNOWN_ERROR: "unknown_error"
}, K;
(function(n) {
  n.BEARER = "Bearer", n.POP = "pop", n.SSH = "ssh-cert";
})(K || (K = {}));
var at = {
  // Default time to throttle RequestThumbprint in seconds
  DEFAULT_THROTTLE_TIME_SECONDS: 60,
  // Default maximum time to throttle in seconds, overrides what the server sends back
  DEFAULT_MAX_THROTTLE_TIME_SECONDS: 3600,
  // Prefix for storing throttling entries
  THROTTLING_PREFIX: "throttling",
  // Value assigned to the x-ms-lib-capability header to indicate to the server the library supports throttling
  X_MS_LIB_CAPABILITY_VALUE: "retry-after, h429"
}, ur = {
  INVALID_GRANT_ERROR: "invalid_grant",
  CLIENT_MISMATCH_ERROR: "client_mismatch"
}, Tt;
(function(n) {
  n.username = "username", n.password = "password";
})(Tt || (Tt = {}));
var Ye;
(function(n) {
  n[n.httpSuccess = 200] = "httpSuccess", n[n.httpBadRequest = 400] = "httpBadRequest";
})(Ye || (Ye = {}));
var Pe;
(function(n) {
  n.FAILED_AUTO_DETECTION = "1", n.INTERNAL_CACHE = "2", n.ENVIRONMENT_VARIABLE = "3", n.IMDS = "4";
})(Pe || (Pe = {}));
var Le;
(function(n) {
  n.CONFIGURED_MATCHES_DETECTED = "1", n.CONFIGURED_NO_AUTO_DETECTION = "2", n.CONFIGURED_NOT_DETECTED = "3", n.AUTO_DETECTION_REQUESTED_SUCCESSFUL = "4", n.AUTO_DETECTION_REQUESTED_FAILED = "5";
})(Le || (Le = {}));
var De;
(function(n) {
  n.NO_CACHE_HIT = "0", n.FORCE_REFRESH = "1", n.NO_CACHED_ACCESS_TOKEN = "2", n.CACHED_ACCESS_TOKEN_EXPIRED = "3", n.REFRESH_CACHED_ACCESS_TOKEN = "4";
})(De || (De = {}));
var xt;
(function(n) {
  n.Jwt = "JWT", n.Jwk = "JWK", n.Pop = "pop";
})(xt || (xt = {}));
/*! @azure/msal-common v13.0.0 2023-05-01 */
var mt = {
  unexpectedError: {
    code: "unexpected_error",
    desc: "Unexpected error in authentication."
  },
  postRequestFailed: {
    code: "post_request_failed",
    desc: "Post request failed from the network, could be a 4xx/5xx or a network unavailability. Please check the exact error code for details."
  }
}, k = (
  /** @class */
  function(n) {
    ue(e, n);
    function e(t, r, o) {
      var i = this, a = r ? t + ": " + r : t;
      return i = n.call(this, a) || this, Object.setPrototypeOf(i, e.prototype), i.errorCode = t || h.EMPTY_STRING, i.errorMessage = r || h.EMPTY_STRING, i.subError = o || h.EMPTY_STRING, i.name = "AuthError", i;
    }
    return e.prototype.setCorrelationId = function(t) {
      this.correlationId = t;
    }, e.createUnexpectedError = function(t) {
      return new e(mt.unexpectedError.code, mt.unexpectedError.desc + ": " + t);
    }, e.createPostRequestFailed = function(t) {
      return new e(mt.postRequestFailed.code, mt.postRequestFailed.desc + ": " + t);
    }, e;
  }(Error)
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var It = {
  createNewGuid: function() {
    var n = "Crypto interface - createNewGuid() has not been implemented";
    throw k.createUnexpectedError(n);
  },
  base64Decode: function() {
    var n = "Crypto interface - base64Decode() has not been implemented";
    throw k.createUnexpectedError(n);
  },
  base64Encode: function() {
    var n = "Crypto interface - base64Encode() has not been implemented";
    throw k.createUnexpectedError(n);
  },
  generatePkceCodes: function() {
    return O(this, void 0, void 0, function() {
      var n;
      return U(this, function(e) {
        throw n = "Crypto interface - generatePkceCodes() has not been implemented", k.createUnexpectedError(n);
      });
    });
  },
  getPublicKeyThumbprint: function() {
    return O(this, void 0, void 0, function() {
      var n;
      return U(this, function(e) {
        throw n = "Crypto interface - getPublicKeyThumbprint() has not been implemented", k.createUnexpectedError(n);
      });
    });
  },
  removeTokenBindingKey: function() {
    return O(this, void 0, void 0, function() {
      var n;
      return U(this, function(e) {
        throw n = "Crypto interface - removeTokenBindingKey() has not been implemented", k.createUnexpectedError(n);
      });
    });
  },
  clearKeystore: function() {
    return O(this, void 0, void 0, function() {
      var n;
      return U(this, function(e) {
        throw n = "Crypto interface - clearKeystore() has not been implemented", k.createUnexpectedError(n);
      });
    });
  },
  signJwt: function() {
    return O(this, void 0, void 0, function() {
      var n;
      return U(this, function(e) {
        throw n = "Crypto interface - signJwt() has not been implemented", k.createUnexpectedError(n);
      });
    });
  },
  hashString: function() {
    return O(this, void 0, void 0, function() {
      var n;
      return U(this, function(e) {
        throw n = "Crypto interface - hashString() has not been implemented", k.createUnexpectedError(n);
      });
    });
  }
};
/*! @azure/msal-common v13.0.0 2023-05-01 */
var _ = {
  clientInfoDecodingError: {
    code: "client_info_decoding_error",
    desc: "The client info could not be parsed/decoded correctly. Please review the trace to determine the root cause."
  },
  clientInfoEmptyError: {
    code: "client_info_empty_error",
    desc: "The client info was empty. Please review the trace to determine the root cause."
  },
  tokenParsingError: {
    code: "token_parsing_error",
    desc: "Token cannot be parsed. Please review stack trace to determine root cause."
  },
  nullOrEmptyToken: {
    code: "null_or_empty_token",
    desc: "The token is null or empty. Please review the trace to determine the root cause."
  },
  endpointResolutionError: {
    code: "endpoints_resolution_error",
    desc: "Error: could not resolve endpoints. Please check network and try again."
  },
  networkError: {
    code: "network_error",
    desc: "Network request failed. Please check network trace to determine root cause."
  },
  unableToGetOpenidConfigError: {
    code: "openid_config_error",
    desc: "Could not retrieve endpoints. Check your authority and verify the .well-known/openid-configuration endpoint returns the required endpoints."
  },
  hashNotDeserialized: {
    code: "hash_not_deserialized",
    desc: "The hash parameters could not be deserialized. Please review the trace to determine the root cause."
  },
  blankGuidGenerated: {
    code: "blank_guid_generated",
    desc: "The guid generated was blank. Please review the trace to determine the root cause."
  },
  invalidStateError: {
    code: "invalid_state",
    desc: "State was not the expected format. Please check the logs to determine whether the request was sent using ProtocolUtils.setRequestState()."
  },
  stateMismatchError: {
    code: "state_mismatch",
    desc: "State mismatch error. Please check your network. Continued requests may cause cache overflow."
  },
  stateNotFoundError: {
    code: "state_not_found",
    desc: "State not found"
  },
  nonceMismatchError: {
    code: "nonce_mismatch",
    desc: "Nonce mismatch error. This may be caused by a race condition in concurrent requests."
  },
  nonceNotFoundError: {
    code: "nonce_not_found",
    desc: "nonce not found"
  },
  authTimeNotFoundError: {
    code: "auth_time_not_found",
    desc: "Max Age was requested and the ID token is missing the auth_time variable. auth_time is an optional claim and is not enabled by default - it must be enabled. See https://aka.ms/msaljs/optional-claims for more information."
  },
  maxAgeTranspiredError: {
    code: "max_age_transpired",
    desc: "Max Age is set to 0, or too much time has elapsed since the last end-user authentication."
  },
  noTokensFoundError: {
    code: "no_tokens_found",
    desc: "No tokens were found for the given scopes, and no authorization code was passed to acquireToken. You must retrieve an authorization code before making a call to acquireToken()."
  },
  multipleMatchingTokens: {
    code: "multiple_matching_tokens",
    desc: "The cache contains multiple tokens satisfying the requirements. Call AcquireToken again providing more requirements such as authority or account."
  },
  multipleMatchingAccounts: {
    code: "multiple_matching_accounts",
    desc: "The cache contains multiple accounts satisfying the given parameters. Please pass more info to obtain the correct account"
  },
  multipleMatchingAppMetadata: {
    code: "multiple_matching_appMetadata",
    desc: "The cache contains multiple appMetadata satisfying the given parameters. Please pass more info to obtain the correct appMetadata"
  },
  tokenRequestCannotBeMade: {
    code: "request_cannot_be_made",
    desc: "Token request cannot be made without authorization code or refresh token."
  },
  appendEmptyScopeError: {
    code: "cannot_append_empty_scope",
    desc: "Cannot append null or empty scope to ScopeSet. Please check the stack trace for more info."
  },
  removeEmptyScopeError: {
    code: "cannot_remove_empty_scope",
    desc: "Cannot remove null or empty scope from ScopeSet. Please check the stack trace for more info."
  },
  appendScopeSetError: {
    code: "cannot_append_scopeset",
    desc: "Cannot append ScopeSet due to error."
  },
  emptyInputScopeSetError: {
    code: "empty_input_scopeset",
    desc: "Empty input ScopeSet cannot be processed."
  },
  DeviceCodePollingCancelled: {
    code: "device_code_polling_cancelled",
    desc: "Caller has cancelled token endpoint polling during device code flow by setting DeviceCodeRequest.cancel = true."
  },
  DeviceCodeExpired: {
    code: "device_code_expired",
    desc: "Device code is expired."
  },
  DeviceCodeUnknownError: {
    code: "device_code_unknown_error",
    desc: "Device code stopped polling for unknown reasons."
  },
  NoAccountInSilentRequest: {
    code: "no_account_in_silent_request",
    desc: "Please pass an account object, silent flow is not supported without account information"
  },
  invalidCacheRecord: {
    code: "invalid_cache_record",
    desc: "Cache record object was null or undefined."
  },
  invalidCacheEnvironment: {
    code: "invalid_cache_environment",
    desc: "Invalid environment when attempting to create cache entry"
  },
  noAccountFound: {
    code: "no_account_found",
    desc: "No account found in cache for given key."
  },
  CachePluginError: {
    code: "no cache plugin set on CacheManager",
    desc: "ICachePlugin needs to be set before using readFromStorage or writeFromStorage"
  },
  noCryptoObj: {
    code: "no_crypto_object",
    desc: "No crypto object detected. This is required for the following operation: "
  },
  invalidCacheType: {
    code: "invalid_cache_type",
    desc: "Invalid cache type"
  },
  unexpectedAccountType: {
    code: "unexpected_account_type",
    desc: "Unexpected account type."
  },
  unexpectedCredentialType: {
    code: "unexpected_credential_type",
    desc: "Unexpected credential type."
  },
  invalidAssertion: {
    code: "invalid_assertion",
    desc: "Client assertion must meet requirements described in https://tools.ietf.org/html/rfc7515"
  },
  invalidClientCredential: {
    code: "invalid_client_credential",
    desc: "Client credential (secret, certificate, or assertion) must not be empty when creating a confidential client. An application should at most have one credential"
  },
  tokenRefreshRequired: {
    code: "token_refresh_required",
    desc: "Cannot return token from cache because it must be refreshed. This may be due to one of the following reasons: forceRefresh parameter is set to true, claims have been requested, there is no cached access token or it is expired."
  },
  userTimeoutReached: {
    code: "user_timeout_reached",
    desc: "User defined timeout for device code polling reached"
  },
  tokenClaimsRequired: {
    code: "token_claims_cnf_required_for_signedjwt",
    desc: "Cannot generate a POP jwt if the token_claims are not populated"
  },
  noAuthorizationCodeFromServer: {
    code: "authorization_code_missing_from_server_response",
    desc: "Server response does not contain an authorization code to proceed"
  },
  noAzureRegionDetected: {
    code: "no_azure_region_detected",
    desc: "No azure region was detected and no fallback was made available"
  },
  accessTokenEntityNullError: {
    code: "access_token_entity_null",
    desc: "Access token entity is null, please check logs and cache to ensure a valid access token is present."
  },
  bindingKeyNotRemovedError: {
    code: "binding_key_not_removed",
    desc: "Could not remove the credential's binding key from storage."
  },
  logoutNotSupported: {
    code: "end_session_endpoint_not_supported",
    desc: "Provided authority does not support logout."
  },
  keyIdMissing: {
    code: "key_id_missing",
    desc: "A keyId value is missing from the requested bound token's cache record and is required to match the token to it's stored binding key."
  },
  noNetworkConnectivity: {
    code: "no_network_connectivity",
    desc: "No network connectivity. Check your internet connection."
  },
  userCanceledError: {
    code: "user_canceled",
    desc: "User canceled the flow."
  }
}, w = (
  /** @class */
  function(n) {
    ue(e, n);
    function e(t, r) {
      var o = n.call(this, t, r) || this;
      return o.name = "ClientAuthError", Object.setPrototypeOf(o, e.prototype), o;
    }
    return e.createClientInfoDecodingError = function(t) {
      return new e(_.clientInfoDecodingError.code, _.clientInfoDecodingError.desc + " Failed with error: " + t);
    }, e.createClientInfoEmptyError = function() {
      return new e(_.clientInfoEmptyError.code, "" + _.clientInfoEmptyError.desc);
    }, e.createTokenParsingError = function(t) {
      return new e(_.tokenParsingError.code, _.tokenParsingError.desc + " Failed with error: " + t);
    }, e.createTokenNullOrEmptyError = function(t) {
      return new e(_.nullOrEmptyToken.code, _.nullOrEmptyToken.desc + " Raw Token Value: " + t);
    }, e.createEndpointDiscoveryIncompleteError = function(t) {
      return new e(_.endpointResolutionError.code, _.endpointResolutionError.desc + " Detail: " + t);
    }, e.createNetworkError = function(t, r) {
      return new e(_.networkError.code, _.networkError.desc + " | Fetch client threw: " + r + " | Attempted to reach: " + t.split("?")[0]);
    }, e.createUnableToGetOpenidConfigError = function(t) {
      return new e(_.unableToGetOpenidConfigError.code, _.unableToGetOpenidConfigError.desc + " Attempted to retrieve endpoints from: " + t);
    }, e.createHashNotDeserializedError = function(t) {
      return new e(_.hashNotDeserialized.code, _.hashNotDeserialized.desc + " Given Object: " + t);
    }, e.createInvalidStateError = function(t, r) {
      return new e(_.invalidStateError.code, _.invalidStateError.desc + " Invalid State: " + t + ", Root Err: " + r);
    }, e.createStateMismatchError = function() {
      return new e(_.stateMismatchError.code, _.stateMismatchError.desc);
    }, e.createStateNotFoundError = function(t) {
      return new e(_.stateNotFoundError.code, _.stateNotFoundError.desc + ":  " + t);
    }, e.createNonceMismatchError = function() {
      return new e(_.nonceMismatchError.code, _.nonceMismatchError.desc);
    }, e.createAuthTimeNotFoundError = function() {
      return new e(_.authTimeNotFoundError.code, _.authTimeNotFoundError.desc);
    }, e.createMaxAgeTranspiredError = function() {
      return new e(_.maxAgeTranspiredError.code, _.maxAgeTranspiredError.desc);
    }, e.createNonceNotFoundError = function(t) {
      return new e(_.nonceNotFoundError.code, _.nonceNotFoundError.desc + ":  " + t);
    }, e.createMultipleMatchingTokensInCacheError = function() {
      return new e(_.multipleMatchingTokens.code, _.multipleMatchingTokens.desc + ".");
    }, e.createMultipleMatchingAccountsInCacheError = function() {
      return new e(_.multipleMatchingAccounts.code, _.multipleMatchingAccounts.desc);
    }, e.createMultipleMatchingAppMetadataInCacheError = function() {
      return new e(_.multipleMatchingAppMetadata.code, _.multipleMatchingAppMetadata.desc);
    }, e.createTokenRequestCannotBeMadeError = function() {
      return new e(_.tokenRequestCannotBeMade.code, _.tokenRequestCannotBeMade.desc);
    }, e.createAppendEmptyScopeToSetError = function(t) {
      return new e(_.appendEmptyScopeError.code, _.appendEmptyScopeError.desc + " Given Scope: " + t);
    }, e.createRemoveEmptyScopeFromSetError = function(t) {
      return new e(_.removeEmptyScopeError.code, _.removeEmptyScopeError.desc + " Given Scope: " + t);
    }, e.createAppendScopeSetError = function(t) {
      return new e(_.appendScopeSetError.code, _.appendScopeSetError.desc + " Detail Error: " + t);
    }, e.createEmptyInputScopeSetError = function() {
      return new e(_.emptyInputScopeSetError.code, "" + _.emptyInputScopeSetError.desc);
    }, e.createDeviceCodeCancelledError = function() {
      return new e(_.DeviceCodePollingCancelled.code, "" + _.DeviceCodePollingCancelled.desc);
    }, e.createDeviceCodeExpiredError = function() {
      return new e(_.DeviceCodeExpired.code, "" + _.DeviceCodeExpired.desc);
    }, e.createDeviceCodeUnknownError = function() {
      return new e(_.DeviceCodeUnknownError.code, "" + _.DeviceCodeUnknownError.desc);
    }, e.createNoAccountInSilentRequestError = function() {
      return new e(_.NoAccountInSilentRequest.code, "" + _.NoAccountInSilentRequest.desc);
    }, e.createNullOrUndefinedCacheRecord = function() {
      return new e(_.invalidCacheRecord.code, _.invalidCacheRecord.desc);
    }, e.createInvalidCacheEnvironmentError = function() {
      return new e(_.invalidCacheEnvironment.code, _.invalidCacheEnvironment.desc);
    }, e.createNoAccountFoundError = function() {
      return new e(_.noAccountFound.code, _.noAccountFound.desc);
    }, e.createCachePluginError = function() {
      return new e(_.CachePluginError.code, "" + _.CachePluginError.desc);
    }, e.createNoCryptoObjectError = function(t) {
      return new e(_.noCryptoObj.code, "" + _.noCryptoObj.desc + t);
    }, e.createInvalidCacheTypeError = function() {
      return new e(_.invalidCacheType.code, "" + _.invalidCacheType.desc);
    }, e.createUnexpectedAccountTypeError = function() {
      return new e(_.unexpectedAccountType.code, "" + _.unexpectedAccountType.desc);
    }, e.createUnexpectedCredentialTypeError = function() {
      return new e(_.unexpectedCredentialType.code, "" + _.unexpectedCredentialType.desc);
    }, e.createInvalidAssertionError = function() {
      return new e(_.invalidAssertion.code, "" + _.invalidAssertion.desc);
    }, e.createInvalidCredentialError = function() {
      return new e(_.invalidClientCredential.code, "" + _.invalidClientCredential.desc);
    }, e.createRefreshRequiredError = function() {
      return new e(_.tokenRefreshRequired.code, _.tokenRefreshRequired.desc);
    }, e.createUserTimeoutReachedError = function() {
      return new e(_.userTimeoutReached.code, _.userTimeoutReached.desc);
    }, e.createTokenClaimsRequiredError = function() {
      return new e(_.tokenClaimsRequired.code, _.tokenClaimsRequired.desc);
    }, e.createNoAuthCodeInServerResponseError = function() {
      return new e(_.noAuthorizationCodeFromServer.code, _.noAuthorizationCodeFromServer.desc);
    }, e.createBindingKeyNotRemovedError = function() {
      return new e(_.bindingKeyNotRemovedError.code, _.bindingKeyNotRemovedError.desc);
    }, e.createLogoutNotSupportedError = function() {
      return new e(_.logoutNotSupported.code, _.logoutNotSupported.desc);
    }, e.createKeyIdMissingError = function() {
      return new e(_.keyIdMissing.code, _.keyIdMissing.desc);
    }, e.createNoNetworkConnectivityError = function() {
      return new e(_.noNetworkConnectivity.code, _.noNetworkConnectivity.desc);
    }, e.createUserCanceledError = function() {
      return new e(_.userCanceledError.code, _.userCanceledError.desc);
    }, e;
  }(k)
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var I = (
  /** @class */
  function() {
    function n() {
    }
    return n.decodeAuthToken = function(e) {
      if (n.isEmpty(e))
        throw w.createTokenNullOrEmptyError(e);
      var t = /^([^\.\s]*)\.([^\.\s]+)\.([^\.\s]*)$/, r = t.exec(e);
      if (!r || r.length < 4)
        throw w.createTokenParsingError("Given token is malformed: " + JSON.stringify(e));
      var o = {
        header: r[1],
        JWSPayload: r[2],
        JWSSig: r[3]
      };
      return o;
    }, n.isEmpty = function(e) {
      return typeof e > "u" || !e || e.length === 0;
    }, n.isEmptyObj = function(e) {
      if (e && !n.isEmpty(e))
        try {
          var t = JSON.parse(e);
          return Object.keys(t).length === 0;
        } catch {
        }
      return !0;
    }, n.startsWith = function(e, t) {
      return e.indexOf(t) === 0;
    }, n.endsWith = function(e, t) {
      return e.length >= t.length && e.lastIndexOf(t) === e.length - t.length;
    }, n.queryStringToObject = function(e) {
      var t = {}, r = e.split("&"), o = function(i) {
        return decodeURIComponent(i.replace(/\+/g, " "));
      };
      return r.forEach(function(i) {
        if (i.trim()) {
          var a = i.split(/=(.+)/g, 2), s = a[0], c = a[1];
          s && c && (t[o(s)] = o(c));
        }
      }), t;
    }, n.trimArrayEntries = function(e) {
      return e.map(function(t) {
        return t.trim();
      });
    }, n.removeEmptyStringsFromArray = function(e) {
      return e.filter(function(t) {
        return !n.isEmpty(t);
      });
    }, n.jsonParseHelper = function(e) {
      try {
        return JSON.parse(e);
      } catch {
        return null;
      }
    }, n.matchPattern = function(e, t) {
      var r = new RegExp(e.replace(/\\/g, "\\\\").replace(/\*/g, "[^ ]*").replace(/\?/g, "\\?"));
      return r.test(t);
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var z;
(function(n) {
  n[n.Error = 0] = "Error", n[n.Warning = 1] = "Warning", n[n.Info = 2] = "Info", n[n.Verbose = 3] = "Verbose", n[n.Trace = 4] = "Trace";
})(z || (z = {}));
var Xt = (
  /** @class */
  function() {
    function n(e, t, r) {
      this.level = z.Info;
      var o = function() {
      }, i = e || n.createDefaultLoggerOptions();
      this.localCallback = i.loggerCallback || o, this.piiLoggingEnabled = i.piiLoggingEnabled || !1, this.level = typeof i.logLevel == "number" ? i.logLevel : z.Info, this.correlationId = i.correlationId || h.EMPTY_STRING, this.packageName = t || h.EMPTY_STRING, this.packageVersion = r || h.EMPTY_STRING;
    }
    return n.createDefaultLoggerOptions = function() {
      return {
        loggerCallback: function() {
        },
        piiLoggingEnabled: !1,
        logLevel: z.Info
      };
    }, n.prototype.clone = function(e, t, r) {
      return new n({ loggerCallback: this.localCallback, piiLoggingEnabled: this.piiLoggingEnabled, logLevel: this.level, correlationId: r || this.correlationId }, e, t);
    }, n.prototype.logMessage = function(e, t) {
      if (!(t.logLevel > this.level || !this.piiLoggingEnabled && t.containsPii)) {
        var r = (/* @__PURE__ */ new Date()).toUTCString(), o;
        I.isEmpty(t.correlationId) ? I.isEmpty(this.correlationId) ? o = "[" + r + "]" : o = "[" + r + "] : [" + this.correlationId + "]" : o = "[" + r + "] : [" + t.correlationId + "]";
        var i = o + " : " + this.packageName + "@" + this.packageVersion + " : " + z[t.logLevel] + " - " + e;
        this.executeCallback(t.logLevel, i, t.containsPii || !1);
      }
    }, n.prototype.executeCallback = function(e, t, r) {
      this.localCallback && this.localCallback(e, t, r);
    }, n.prototype.error = function(e, t) {
      this.logMessage(e, {
        logLevel: z.Error,
        containsPii: !1,
        correlationId: t || h.EMPTY_STRING
      });
    }, n.prototype.errorPii = function(e, t) {
      this.logMessage(e, {
        logLevel: z.Error,
        containsPii: !0,
        correlationId: t || h.EMPTY_STRING
      });
    }, n.prototype.warning = function(e, t) {
      this.logMessage(e, {
        logLevel: z.Warning,
        containsPii: !1,
        correlationId: t || h.EMPTY_STRING
      });
    }, n.prototype.warningPii = function(e, t) {
      this.logMessage(e, {
        logLevel: z.Warning,
        containsPii: !0,
        correlationId: t || h.EMPTY_STRING
      });
    }, n.prototype.info = function(e, t) {
      this.logMessage(e, {
        logLevel: z.Info,
        containsPii: !1,
        correlationId: t || h.EMPTY_STRING
      });
    }, n.prototype.infoPii = function(e, t) {
      this.logMessage(e, {
        logLevel: z.Info,
        containsPii: !0,
        correlationId: t || h.EMPTY_STRING
      });
    }, n.prototype.verbose = function(e, t) {
      this.logMessage(e, {
        logLevel: z.Verbose,
        containsPii: !1,
        correlationId: t || h.EMPTY_STRING
      });
    }, n.prototype.verbosePii = function(e, t) {
      this.logMessage(e, {
        logLevel: z.Verbose,
        containsPii: !0,
        correlationId: t || h.EMPTY_STRING
      });
    }, n.prototype.trace = function(e, t) {
      this.logMessage(e, {
        logLevel: z.Trace,
        containsPii: !1,
        correlationId: t || h.EMPTY_STRING
      });
    }, n.prototype.tracePii = function(e, t) {
      this.logMessage(e, {
        logLevel: z.Trace,
        containsPii: !0,
        correlationId: t || h.EMPTY_STRING
      });
    }, n.prototype.isPiiLoggingEnabled = function() {
      return this.piiLoggingEnabled || !1;
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var Lr = "@azure/msal-common", $t = "13.0.0";
/*! @azure/msal-common v13.0.0 2023-05-01 */
var lt;
(function(n) {
  n[n.None = 0] = "None", n.AzurePublic = "https://login.microsoftonline.com", n.AzurePpe = "https://login.windows-ppe.net", n.AzureChina = "https://login.chinacloudapi.cn", n.AzureGermany = "https://login.microsoftonline.de", n.AzureUsGovernment = "https://login.microsoftonline.us";
})(lt || (lt = {}));
/*! @azure/msal-common v13.0.0 2023-05-01 */
var H = {
  redirectUriNotSet: {
    code: "redirect_uri_empty",
    desc: "A redirect URI is required for all calls, and none has been set."
  },
  postLogoutUriNotSet: {
    code: "post_logout_uri_empty",
    desc: "A post logout redirect has not been set."
  },
  claimsRequestParsingError: {
    code: "claims_request_parsing_error",
    desc: "Could not parse the given claims request object."
  },
  authorityUriInsecure: {
    code: "authority_uri_insecure",
    desc: "Authority URIs must use https.  Please see here for valid authority configuration options: https://docs.microsoft.com/en-us/azure/active-directory/develop/msal-js-initializing-client-applications#configuration-options"
  },
  urlParseError: {
    code: "url_parse_error",
    desc: "URL could not be parsed into appropriate segments."
  },
  urlEmptyError: {
    code: "empty_url_error",
    desc: "URL was empty or null."
  },
  emptyScopesError: {
    code: "empty_input_scopes_error",
    desc: "Scopes cannot be passed as null, undefined or empty array because they are required to obtain an access token."
  },
  nonArrayScopesError: {
    code: "nonarray_input_scopes_error",
    desc: "Scopes cannot be passed as non-array."
  },
  clientIdSingleScopeError: {
    code: "clientid_input_scopes_error",
    desc: "Client ID can only be provided as a single scope."
  },
  invalidPrompt: {
    code: "invalid_prompt_value",
    desc: "Supported prompt values are 'login', 'select_account', 'consent', 'create', 'none' and 'no_session'.  Please see here for valid configuration options: https://azuread.github.io/microsoft-authentication-library-for-js/ref/modules/_azure_msal_common.html#commonauthorizationurlrequest"
  },
  invalidClaimsRequest: {
    code: "invalid_claims",
    desc: "Given claims parameter must be a stringified JSON object."
  },
  tokenRequestEmptyError: {
    code: "token_request_empty",
    desc: "Token request was empty and not found in cache."
  },
  logoutRequestEmptyError: {
    code: "logout_request_empty",
    desc: "The logout request was null or undefined."
  },
  invalidCodeChallengeMethod: {
    code: "invalid_code_challenge_method",
    desc: 'code_challenge_method passed is invalid. Valid values are "plain" and "S256".'
  },
  invalidCodeChallengeParams: {
    code: "pkce_params_missing",
    desc: "Both params: code_challenge and code_challenge_method are to be passed if to be sent in the request"
  },
  invalidCloudDiscoveryMetadata: {
    code: "invalid_cloud_discovery_metadata",
    desc: "Invalid cloudDiscoveryMetadata provided. Must be a stringified JSON object containing tenant_discovery_endpoint and metadata fields"
  },
  invalidAuthorityMetadata: {
    code: "invalid_authority_metadata",
    desc: "Invalid authorityMetadata provided. Must by a stringified JSON object containing authorization_endpoint, token_endpoint, issuer fields."
  },
  untrustedAuthority: {
    code: "untrusted_authority",
    desc: "The provided authority is not a trusted authority. Please include this authority in the knownAuthorities config parameter."
  },
  invalidAzureCloudInstance: {
    code: "invalid_azure_cloud_instance",
    desc: "Invalid AzureCloudInstance provided. Please refer MSAL JS docs: aks.ms/msaljs/azure_cloud_instance for valid values"
  },
  missingSshJwk: {
    code: "missing_ssh_jwk",
    desc: "Missing sshJwk in SSH certificate request. A stringified JSON Web Key is required when using the SSH authentication scheme."
  },
  missingSshKid: {
    code: "missing_ssh_kid",
    desc: "Missing sshKid in SSH certificate request. A string that uniquely identifies the public SSH key is required when using the SSH authentication scheme."
  },
  missingNonceAuthenticationHeader: {
    code: "missing_nonce_authentication_header",
    desc: "Unable to find an authentication header containing server nonce. Either the Authentication-Info or WWW-Authenticate headers must be present in order to obtain a server nonce."
  },
  invalidAuthenticationHeader: {
    code: "invalid_authentication_header",
    desc: "Invalid authentication header provided"
  }
}, G = (
  /** @class */
  function(n) {
    ue(e, n);
    function e(t, r) {
      var o = n.call(this, t, r) || this;
      return o.name = "ClientConfigurationError", Object.setPrototypeOf(o, e.prototype), o;
    }
    return e.createRedirectUriEmptyError = function() {
      return new e(H.redirectUriNotSet.code, H.redirectUriNotSet.desc);
    }, e.createPostLogoutRedirectUriEmptyError = function() {
      return new e(H.postLogoutUriNotSet.code, H.postLogoutUriNotSet.desc);
    }, e.createClaimsRequestParsingError = function(t) {
      return new e(H.claimsRequestParsingError.code, H.claimsRequestParsingError.desc + " Given value: " + t);
    }, e.createInsecureAuthorityUriError = function(t) {
      return new e(H.authorityUriInsecure.code, H.authorityUriInsecure.desc + " Given URI: " + t);
    }, e.createUrlParseError = function(t) {
      return new e(H.urlParseError.code, H.urlParseError.desc + " Given Error: " + t);
    }, e.createUrlEmptyError = function() {
      return new e(H.urlEmptyError.code, H.urlEmptyError.desc);
    }, e.createEmptyScopesArrayError = function() {
      return new e(H.emptyScopesError.code, "" + H.emptyScopesError.desc);
    }, e.createClientIdSingleScopeError = function(t) {
      return new e(H.clientIdSingleScopeError.code, H.clientIdSingleScopeError.desc + " Given Scopes: " + t);
    }, e.createInvalidPromptError = function(t) {
      return new e(H.invalidPrompt.code, H.invalidPrompt.desc + " Given value: " + t);
    }, e.createInvalidClaimsRequestError = function() {
      return new e(H.invalidClaimsRequest.code, H.invalidClaimsRequest.desc);
    }, e.createEmptyLogoutRequestError = function() {
      return new e(H.logoutRequestEmptyError.code, H.logoutRequestEmptyError.desc);
    }, e.createEmptyTokenRequestError = function() {
      return new e(H.tokenRequestEmptyError.code, H.tokenRequestEmptyError.desc);
    }, e.createInvalidCodeChallengeMethodError = function() {
      return new e(H.invalidCodeChallengeMethod.code, H.invalidCodeChallengeMethod.desc);
    }, e.createInvalidCodeChallengeParamsError = function() {
      return new e(H.invalidCodeChallengeParams.code, H.invalidCodeChallengeParams.desc);
    }, e.createInvalidCloudDiscoveryMetadataError = function() {
      return new e(H.invalidCloudDiscoveryMetadata.code, H.invalidCloudDiscoveryMetadata.desc);
    }, e.createInvalidAuthorityMetadataError = function() {
      return new e(H.invalidAuthorityMetadata.code, H.invalidAuthorityMetadata.desc);
    }, e.createUntrustedAuthorityError = function() {
      return new e(H.untrustedAuthority.code, H.untrustedAuthority.desc);
    }, e.createInvalidAzureCloudInstanceError = function() {
      return new e(H.invalidAzureCloudInstance.code, H.invalidAzureCloudInstance.desc);
    }, e.createMissingSshJwkError = function() {
      return new e(H.missingSshJwk.code, H.missingSshJwk.desc);
    }, e.createMissingSshKidError = function() {
      return new e(H.missingSshKid.code, H.missingSshKid.desc);
    }, e.createMissingNonceAuthenticationHeadersError = function() {
      return new e(H.missingNonceAuthenticationHeader.code, H.missingNonceAuthenticationHeader.desc);
    }, e.createInvalidAuthenticationHeaderError = function(t, r) {
      return new e(H.invalidAuthenticationHeader.code, H.invalidAuthenticationHeader.desc + ". Invalid header: " + t + ". Details: " + r);
    }, e;
  }(w)
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var Z = (
  /** @class */
  function() {
    function n(e) {
      var t = this, r = e ? I.trimArrayEntries(Ot(e)) : [], o = r ? I.removeEmptyStringsFromArray(r) : [];
      this.validateInputScopes(o), this.scopes = /* @__PURE__ */ new Set(), o.forEach(function(i) {
        return t.scopes.add(i);
      });
    }
    return n.fromString = function(e) {
      var t = e || h.EMPTY_STRING, r = t.split(" ");
      return new n(r);
    }, n.createSearchScopes = function(e) {
      var t = new n(e);
      return t.containsOnlyOIDCScopes() ? t.removeScope(h.OFFLINE_ACCESS_SCOPE) : t.removeOIDCScopes(), t;
    }, n.prototype.validateInputScopes = function(e) {
      if (!e || e.length < 1)
        throw G.createEmptyScopesArrayError();
    }, n.prototype.containsScope = function(e) {
      var t = this.printScopesLowerCase().split(" "), r = new n(t);
      return I.isEmpty(e) ? !1 : r.scopes.has(e.toLowerCase());
    }, n.prototype.containsScopeSet = function(e) {
      var t = this;
      return !e || e.scopes.size <= 0 ? !1 : this.scopes.size >= e.scopes.size && e.asArray().every(function(r) {
        return t.containsScope(r);
      });
    }, n.prototype.containsOnlyOIDCScopes = function() {
      var e = this, t = 0;
      return sr.forEach(function(r) {
        e.containsScope(r) && (t += 1);
      }), this.scopes.size === t;
    }, n.prototype.appendScope = function(e) {
      I.isEmpty(e) || this.scopes.add(e.trim());
    }, n.prototype.appendScopes = function(e) {
      var t = this;
      try {
        e.forEach(function(r) {
          return t.appendScope(r);
        });
      } catch (r) {
        throw w.createAppendScopeSetError(r);
      }
    }, n.prototype.removeScope = function(e) {
      if (I.isEmpty(e))
        throw w.createRemoveEmptyScopeFromSetError(e);
      this.scopes.delete(e.trim());
    }, n.prototype.removeOIDCScopes = function() {
      var e = this;
      sr.forEach(function(t) {
        e.scopes.delete(t);
      });
    }, n.prototype.unionScopeSets = function(e) {
      if (!e)
        throw w.createEmptyInputScopeSetError();
      var t = /* @__PURE__ */ new Set();
      return e.scopes.forEach(function(r) {
        return t.add(r.toLowerCase());
      }), this.scopes.forEach(function(r) {
        return t.add(r.toLowerCase());
      }), t;
    }, n.prototype.intersectingScopeSets = function(e) {
      if (!e)
        throw w.createEmptyInputScopeSetError();
      e.containsOnlyOIDCScopes() || e.removeOIDCScopes();
      var t = this.unionScopeSets(e), r = e.getScopeCount(), o = this.getScopeCount(), i = t.size;
      return i < o + r;
    }, n.prototype.getScopeCount = function() {
      return this.scopes.size;
    }, n.prototype.asArray = function() {
      var e = [];
      return this.scopes.forEach(function(t) {
        return e.push(t);
      }), e;
    }, n.prototype.printScopes = function() {
      if (this.scopes) {
        var e = this.asArray();
        return e.join(" ");
      }
      return h.EMPTY_STRING;
    }, n.prototype.printScopesLowerCase = function() {
      return this.printScopes().toLowerCase();
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
function wt(n, e) {
  if (I.isEmpty(n))
    throw w.createClientInfoEmptyError();
  try {
    var t = e.base64Decode(n);
    return JSON.parse(t);
  } catch (r) {
    throw w.createClientInfoDecodingError(r.message);
  }
}
function Qe(n) {
  if (I.isEmpty(n))
    throw w.createClientInfoDecodingError("Home account ID was empty.");
  var e = n.split(V.CLIENT_INFO_SEPARATOR, 2);
  return {
    uid: e[0],
    utid: e.length < 2 ? h.EMPTY_STRING : e[1]
  };
}
/*! @azure/msal-common v13.0.0 2023-05-01 */
var se;
(function(n) {
  n[n.Default = 0] = "Default", n[n.Adfs = 1] = "Adfs", n[n.Dsts = 2] = "Dsts", n[n.Ciam = 3] = "Ciam";
})(se || (se = {}));
/*! @azure/msal-common v13.0.0 2023-05-01 */
var J = (
  /** @class */
  function() {
    function n() {
    }
    return n.prototype.generateAccountId = function() {
      var e = [this.homeAccountId, this.environment];
      return e.join(V.CACHE_KEY_SEPARATOR).toLowerCase();
    }, n.prototype.generateAccountKey = function() {
      return n.generateAccountCacheKey({
        homeAccountId: this.homeAccountId,
        environment: this.environment,
        tenantId: this.realm,
        username: this.username,
        localAccountId: this.localAccountId
      });
    }, n.prototype.generateType = function() {
      switch (this.authorityType) {
        case Se.ADFS_ACCOUNT_TYPE:
          return Ae.ADFS;
        case Se.MSAV1_ACCOUNT_TYPE:
          return Ae.MSA;
        case Se.MSSTS_ACCOUNT_TYPE:
          return Ae.MSSTS;
        case Se.GENERIC_ACCOUNT_TYPE:
          return Ae.GENERIC;
        default:
          throw w.createUnexpectedAccountTypeError();
      }
    }, n.prototype.getAccountInfo = function() {
      return {
        homeAccountId: this.homeAccountId,
        environment: this.environment,
        tenantId: this.realm,
        username: this.username,
        localAccountId: this.localAccountId,
        name: this.name,
        idTokenClaims: this.idTokenClaims,
        nativeAccountId: this.nativeAccountId
      };
    }, n.generateAccountCacheKey = function(e) {
      var t = [
        e.homeAccountId,
        e.environment || h.EMPTY_STRING,
        e.tenantId || h.EMPTY_STRING
      ];
      return t.join(V.CACHE_KEY_SEPARATOR).toLowerCase();
    }, n.createAccount = function(e, t, r, o, i, a, s, c) {
      var u, l, d, p, f, m, C = new n();
      C.authorityType = Se.MSSTS_ACCOUNT_TYPE, C.clientInfo = e, C.homeAccountId = t, C.nativeAccountId = c;
      var R = s || o && o.getPreferredCache();
      if (!R)
        throw w.createInvalidCacheEnvironmentError();
      if (C.environment = R, C.realm = ((u = r == null ? void 0 : r.claims) === null || u === void 0 ? void 0 : u.tid) || h.EMPTY_STRING, r) {
        C.idTokenClaims = r.claims, C.localAccountId = ((l = r == null ? void 0 : r.claims) === null || l === void 0 ? void 0 : l.oid) || ((d = r == null ? void 0 : r.claims) === null || d === void 0 ? void 0 : d.sub) || h.EMPTY_STRING;
        var b = (p = r == null ? void 0 : r.claims) === null || p === void 0 ? void 0 : p.preferred_username, N = !((f = r == null ? void 0 : r.claims) === null || f === void 0) && f.emails ? r.claims.emails[0] : null;
        C.username = b || N || h.EMPTY_STRING, C.name = (m = r == null ? void 0 : r.claims) === null || m === void 0 ? void 0 : m.name;
      }
      return C.cloudGraphHostName = i, C.msGraphHost = a, C;
    }, n.createGenericAccount = function(e, t, r, o, i, a) {
      var s, c, u, l, d = new n();
      d.authorityType = r && r.authorityType === se.Adfs ? Se.ADFS_ACCOUNT_TYPE : Se.GENERIC_ACCOUNT_TYPE, d.homeAccountId = e, d.realm = h.EMPTY_STRING;
      var p = a || r && r.getPreferredCache();
      if (!p)
        throw w.createInvalidCacheEnvironmentError();
      return t && (d.localAccountId = ((s = t == null ? void 0 : t.claims) === null || s === void 0 ? void 0 : s.oid) || ((c = t == null ? void 0 : t.claims) === null || c === void 0 ? void 0 : c.sub) || h.EMPTY_STRING, d.username = ((u = t == null ? void 0 : t.claims) === null || u === void 0 ? void 0 : u.upn) || h.EMPTY_STRING, d.name = ((l = t == null ? void 0 : t.claims) === null || l === void 0 ? void 0 : l.name) || h.EMPTY_STRING, d.idTokenClaims = t == null ? void 0 : t.claims), d.environment = p, d.cloudGraphHostName = o, d.msGraphHost = i, d;
    }, n.generateHomeAccountId = function(e, t, r, o, i) {
      var a, s = !((a = i == null ? void 0 : i.claims) === null || a === void 0) && a.sub ? i.claims.sub : h.EMPTY_STRING;
      if (t === se.Adfs || t === se.Dsts)
        return s;
      if (e)
        try {
          var c = wt(e, o);
          if (!I.isEmpty(c.uid) && !I.isEmpty(c.utid))
            return "" + c.uid + V.CLIENT_INFO_SEPARATOR + c.utid;
        } catch {
        }
      return r.verbose("No client info in response"), s;
    }, n.isAccountEntity = function(e) {
      return e ? e.hasOwnProperty("homeAccountId") && e.hasOwnProperty("environment") && e.hasOwnProperty("realm") && e.hasOwnProperty("localAccountId") && e.hasOwnProperty("username") && e.hasOwnProperty("authorityType") : !1;
    }, n.accountInfoIsEqual = function(e, t, r) {
      if (!e || !t)
        return !1;
      var o = !0;
      if (r) {
        var i = e.idTokenClaims || {}, a = t.idTokenClaims || {};
        o = i.iat === a.iat && i.nonce === a.nonce;
      }
      return e.homeAccountId === t.homeAccountId && e.localAccountId === t.localAccountId && e.username === t.username && e.tenantId === t.tenantId && e.environment === t.environment && e.nativeAccountId === t.nativeAccountId && o;
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var we = (
  /** @class */
  function() {
    function n(e, t) {
      if (I.isEmpty(e))
        throw w.createTokenNullOrEmptyError(e);
      this.rawToken = e, this.claims = n.extractTokenClaims(e, t);
    }
    return n.extractTokenClaims = function(e, t) {
      var r = I.decodeAuthToken(e);
      try {
        var o = r.JWSPayload, i = t.base64Decode(o);
        return JSON.parse(i);
      } catch (a) {
        throw w.createTokenParsingError(a);
      }
    }, n.checkMaxAge = function(e, t) {
      var r = 3e5;
      if (t === 0 || Date.now() - r > e + t)
        throw w.createMaxAgeTranspiredError();
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var ae = (
  /** @class */
  function() {
    function n(e, t, r) {
      this.clientId = e, this.cryptoImpl = t, this.commonLogger = r.clone(Lr, $t);
    }
    return n.prototype.getAllAccounts = function() {
      var e = this, t = this.getAccountKeys();
      if (t.length < 1)
        return [];
      var r = t.reduce(function(i, a) {
        var s = e.getAccount(a);
        return s && i.push(s), i;
      }, []);
      if (r.length < 1)
        return [];
      var o = r.map(function(i) {
        return e.getAccountInfoFromEntity(i);
      });
      return o;
    }, n.prototype.getAccountInfoFilteredBy = function(e) {
      var t = this.getAccountsFilteredBy(e);
      return t.length > 0 ? this.getAccountInfoFromEntity(t[0]) : null;
    }, n.prototype.getAccountInfoFromEntity = function(e) {
      var t = e.getAccountInfo(), r = this.getIdToken(t);
      return r && (t.idToken = r.secret, t.idTokenClaims = new we(r.secret, this.cryptoImpl).claims), t;
    }, n.prototype.saveCacheRecord = function(e) {
      return O(this, void 0, void 0, function() {
        return U(this, function(t) {
          switch (t.label) {
            case 0:
              if (!e)
                throw w.createNullOrUndefinedCacheRecord();
              return e.account && this.setAccount(e.account), e.idToken && this.setIdTokenCredential(e.idToken), e.accessToken ? [4, this.saveAccessToken(e.accessToken)] : [3, 2];
            case 1:
              t.sent(), t.label = 2;
            case 2:
              return e.refreshToken && this.setRefreshTokenCredential(e.refreshToken), e.appMetadata && this.setAppMetadata(e.appMetadata), [
                2
                /*return*/
              ];
          }
        });
      });
    }, n.prototype.saveAccessToken = function(e) {
      return O(this, void 0, void 0, function() {
        var t, r, o, i, a = this;
        return U(this, function(s) {
          switch (s.label) {
            case 0:
              return t = {
                clientId: e.clientId,
                credentialType: e.credentialType,
                environment: e.environment,
                homeAccountId: e.homeAccountId,
                realm: e.realm,
                tokenType: e.tokenType,
                requestedClaimsHash: e.requestedClaimsHash
              }, r = this.getTokenKeys(), o = Z.fromString(e.target), i = [], r.accessToken.forEach(function(c) {
                if (a.accessTokenKeyMatchesFilter(c, t, !1)) {
                  var u = a.getAccessTokenCredential(c);
                  if (u && a.credentialMatchesFilter(u, t)) {
                    var l = Z.fromString(u.target);
                    l.intersectingScopeSets(o) && i.push(a.removeAccessToken(c));
                  }
                }
              }), [4, Promise.all(i)];
            case 1:
              return s.sent(), this.setAccessTokenCredential(e), [
                2
                /*return*/
              ];
          }
        });
      });
    }, n.prototype.getAccountsFilteredBy = function(e) {
      var t = this, r = this.getAccountKeys(), o = [];
      return r.forEach(function(i) {
        if (t.isAccountKey(i, e.homeAccountId, e.realm)) {
          var a = t.getAccount(i);
          a && (e.homeAccountId && !t.matchHomeAccountId(a, e.homeAccountId) || e.localAccountId && !t.matchLocalAccountId(a, e.localAccountId) || e.username && !t.matchUsername(a, e.username) || e.environment && !t.matchEnvironment(a, e.environment) || e.realm && !t.matchRealm(a, e.realm) || e.nativeAccountId && !t.matchNativeAccountId(a, e.nativeAccountId) || o.push(a));
        }
      }), o;
    }, n.prototype.isAccountKey = function(e, t, r) {
      return !(e.split(V.CACHE_KEY_SEPARATOR).length < 3 || t && !e.toLowerCase().includes(t.toLowerCase()) || r && !e.toLowerCase().includes(r.toLowerCase()));
    }, n.prototype.isCredentialKey = function(e) {
      if (e.split(V.CACHE_KEY_SEPARATOR).length < 6)
        return !1;
      var t = e.toLowerCase();
      if (t.indexOf(M.ID_TOKEN.toLowerCase()) === -1 && t.indexOf(M.ACCESS_TOKEN.toLowerCase()) === -1 && t.indexOf(M.ACCESS_TOKEN_WITH_AUTH_SCHEME.toLowerCase()) === -1 && t.indexOf(M.REFRESH_TOKEN.toLowerCase()) === -1)
        return !1;
      if (t.indexOf(M.REFRESH_TOKEN.toLowerCase()) > -1) {
        var r = "" + M.REFRESH_TOKEN + V.CACHE_KEY_SEPARATOR + this.clientId + V.CACHE_KEY_SEPARATOR, o = "" + M.REFRESH_TOKEN + V.CACHE_KEY_SEPARATOR + ot + V.CACHE_KEY_SEPARATOR;
        if (t.indexOf(r.toLowerCase()) === -1 && t.indexOf(o.toLowerCase()) === -1)
          return !1;
      } else if (t.indexOf(this.clientId.toLowerCase()) === -1)
        return !1;
      return !0;
    }, n.prototype.credentialMatchesFilter = function(e, t) {
      return !(t.clientId && !this.matchClientId(e, t.clientId) || t.userAssertionHash && !this.matchUserAssertionHash(e, t.userAssertionHash) || typeof t.homeAccountId == "string" && !this.matchHomeAccountId(e, t.homeAccountId) || t.environment && !this.matchEnvironment(e, t.environment) || t.realm && !this.matchRealm(e, t.realm) || t.credentialType && !this.matchCredentialType(e, t.credentialType) || t.familyId && !this.matchFamilyId(e, t.familyId) || t.target && !this.matchTarget(e, t.target) || (t.requestedClaimsHash || e.requestedClaimsHash) && e.requestedClaimsHash !== t.requestedClaimsHash || e.credentialType === M.ACCESS_TOKEN_WITH_AUTH_SCHEME && (t.tokenType && !this.matchTokenType(e, t.tokenType) || t.tokenType === K.SSH && t.keyId && !this.matchKeyId(e, t.keyId)));
    }, n.prototype.getAppMetadataFilteredBy = function(e) {
      return this.getAppMetadataFilteredByInternal(e.environment, e.clientId);
    }, n.prototype.getAppMetadataFilteredByInternal = function(e, t) {
      var r = this, o = this.getKeys(), i = {};
      return o.forEach(function(a) {
        if (r.isAppMetadata(a)) {
          var s = r.getAppMetadata(a);
          s && (e && !r.matchEnvironment(s, e) || t && !r.matchClientId(s, t) || (i[a] = s));
        }
      }), i;
    }, n.prototype.getAuthorityMetadataByAlias = function(e) {
      var t = this, r = this.getAuthorityMetadataKeys(), o = null;
      return r.forEach(function(i) {
        if (!(!t.isAuthorityMetadata(i) || i.indexOf(t.clientId) === -1)) {
          var a = t.getAuthorityMetadata(i);
          a && a.aliases.indexOf(e) !== -1 && (o = a);
        }
      }), o;
    }, n.prototype.removeAllAccounts = function() {
      return O(this, void 0, void 0, function() {
        var e, t, r = this;
        return U(this, function(o) {
          switch (o.label) {
            case 0:
              return e = this.getAccountKeys(), t = [], e.forEach(function(i) {
                t.push(r.removeAccount(i));
              }), [4, Promise.all(t)];
            case 1:
              return o.sent(), [
                2
                /*return*/
              ];
          }
        });
      });
    }, n.prototype.removeAccount = function(e) {
      return O(this, void 0, void 0, function() {
        var t;
        return U(this, function(r) {
          switch (r.label) {
            case 0:
              if (t = this.getAccount(e), !t)
                throw w.createNoAccountFoundError();
              return [4, this.removeAccountContext(t)];
            case 1:
              return r.sent(), this.removeItem(e), [
                2
                /*return*/
              ];
          }
        });
      });
    }, n.prototype.removeAccountContext = function(e) {
      return O(this, void 0, void 0, function() {
        var t, r, o, i = this;
        return U(this, function(a) {
          switch (a.label) {
            case 0:
              return t = this.getTokenKeys(), r = e.generateAccountId(), o = [], t.idToken.forEach(function(s) {
                s.indexOf(r) === 0 && i.removeIdToken(s);
              }), t.accessToken.forEach(function(s) {
                s.indexOf(r) === 0 && o.push(i.removeAccessToken(s));
              }), t.refreshToken.forEach(function(s) {
                s.indexOf(r) === 0 && i.removeRefreshToken(s);
              }), [4, Promise.all(o)];
            case 1:
              return a.sent(), [
                2
                /*return*/
              ];
          }
        });
      });
    }, n.prototype.removeAccessToken = function(e) {
      return O(this, void 0, void 0, function() {
        var t, r, o;
        return U(this, function(i) {
          switch (i.label) {
            case 0:
              if (t = this.getAccessTokenCredential(e), !t)
                return [
                  2
                  /*return*/
                ];
              if (t.credentialType.toLowerCase() !== M.ACCESS_TOKEN_WITH_AUTH_SCHEME.toLowerCase())
                return [3, 4];
              if (t.tokenType !== K.POP)
                return [3, 4];
              if (r = t, o = r.keyId, !o)
                return [3, 4];
              i.label = 1;
            case 1:
              return i.trys.push([1, 3, , 4]), [4, this.cryptoImpl.removeTokenBindingKey(o)];
            case 2:
              return i.sent(), [3, 4];
            case 3:
              throw i.sent(), w.createBindingKeyNotRemovedError();
            case 4:
              return [2, this.removeItem(e)];
          }
        });
      });
    }, n.prototype.removeAppMetadata = function() {
      var e = this, t = this.getKeys();
      return t.forEach(function(r) {
        e.isAppMetadata(r) && e.removeItem(r);
      }), !0;
    }, n.prototype.readCacheRecord = function(e, t, r) {
      var o = this.getTokenKeys(), i = this.readAccountFromCache(e), a = this.getIdToken(e, o), s = this.getAccessToken(e, t, o), c = this.getRefreshToken(e, !1, o), u = this.readAppMetadataFromCache(r);
      return i && a && (i.idTokenClaims = new we(a.secret, this.cryptoImpl).claims), {
        account: i,
        idToken: a,
        accessToken: s,
        refreshToken: c,
        appMetadata: u
      };
    }, n.prototype.readAccountFromCache = function(e) {
      var t = J.generateAccountCacheKey(e);
      return this.getAccount(t);
    }, n.prototype.getIdToken = function(e, t) {
      this.commonLogger.trace("CacheManager - getIdToken called");
      var r = {
        homeAccountId: e.homeAccountId,
        environment: e.environment,
        credentialType: M.ID_TOKEN,
        clientId: this.clientId,
        realm: e.tenantId
      }, o = this.getIdTokensByFilter(r, t), i = o.length;
      if (i < 1)
        return this.commonLogger.info("CacheManager:getIdToken - No token found"), null;
      if (i > 1)
        throw w.createMultipleMatchingTokensInCacheError();
      return this.commonLogger.info("CacheManager:getIdToken - Returning id token"), o[0];
    }, n.prototype.getIdTokensByFilter = function(e, t) {
      var r = this, o = t && t.idToken || this.getTokenKeys().idToken, i = [];
      return o.forEach(function(a) {
        if (r.idTokenKeyMatchesFilter(a, B({ clientId: r.clientId }, e))) {
          var s = r.getIdTokenCredential(a);
          s && r.credentialMatchesFilter(s, e) && i.push(s);
        }
      }), i;
    }, n.prototype.idTokenKeyMatchesFilter = function(e, t) {
      var r = e.toLowerCase();
      return !(t.clientId && r.indexOf(t.clientId.toLowerCase()) === -1 || t.homeAccountId && r.indexOf(t.homeAccountId.toLowerCase()) === -1);
    }, n.prototype.removeIdToken = function(e) {
      this.removeItem(e);
    }, n.prototype.removeRefreshToken = function(e) {
      this.removeItem(e);
    }, n.prototype.getAccessToken = function(e, t, r) {
      var o = this;
      this.commonLogger.trace("CacheManager - getAccessToken called");
      var i = Z.createSearchScopes(t.scopes), a = t.authenticationScheme || K.BEARER, s = a && a.toLowerCase() !== K.BEARER.toLowerCase() ? M.ACCESS_TOKEN_WITH_AUTH_SCHEME : M.ACCESS_TOKEN, c = {
        homeAccountId: e.homeAccountId,
        environment: e.environment,
        credentialType: s,
        clientId: this.clientId,
        realm: e.tenantId,
        target: i,
        tokenType: a,
        keyId: t.sshKid,
        requestedClaimsHash: t.requestedClaimsHash
      }, u = r && r.accessToken || this.getTokenKeys().accessToken, l = [];
      u.forEach(function(p) {
        if (o.accessTokenKeyMatchesFilter(p, c, !0)) {
          var f = o.getAccessTokenCredential(p);
          f && o.credentialMatchesFilter(f, c) && l.push(f);
        }
      });
      var d = l.length;
      if (d < 1)
        return this.commonLogger.info("CacheManager:getAccessToken - No token found"), null;
      if (d > 1)
        throw w.createMultipleMatchingTokensInCacheError();
      return this.commonLogger.info("CacheManager:getAccessToken - Returning access token"), l[0];
    }, n.prototype.accessTokenKeyMatchesFilter = function(e, t, r) {
      var o = e.toLowerCase();
      if (t.clientId && o.indexOf(t.clientId.toLowerCase()) === -1 || t.homeAccountId && o.indexOf(t.homeAccountId.toLowerCase()) === -1 || t.realm && o.indexOf(t.realm.toLowerCase()) === -1 || t.requestedClaimsHash && o.indexOf(t.requestedClaimsHash.toLowerCase()) === -1)
        return !1;
      if (t.target)
        for (var i = t.target.asArray(), a = 0; a < i.length; a++) {
          if (r && !o.includes(i[a].toLowerCase()))
            return !1;
          if (!r && o.includes(i[a].toLowerCase()))
            return !0;
        }
      return !0;
    }, n.prototype.getAccessTokensByFilter = function(e) {
      var t = this, r = this.getTokenKeys(), o = [];
      return r.accessToken.forEach(function(i) {
        if (t.accessTokenKeyMatchesFilter(i, e, !0)) {
          var a = t.getAccessTokenCredential(i);
          a && t.credentialMatchesFilter(a, e) && o.push(a);
        }
      }), o;
    }, n.prototype.getRefreshToken = function(e, t, r) {
      var o = this;
      this.commonLogger.trace("CacheManager - getRefreshToken called");
      var i = t ? ot : void 0, a = {
        homeAccountId: e.homeAccountId,
        environment: e.environment,
        credentialType: M.REFRESH_TOKEN,
        clientId: this.clientId,
        familyId: i
      }, s = r && r.refreshToken || this.getTokenKeys().refreshToken, c = [];
      s.forEach(function(l) {
        if (o.refreshTokenKeyMatchesFilter(l, a)) {
          var d = o.getRefreshTokenCredential(l);
          d && o.credentialMatchesFilter(d, a) && c.push(d);
        }
      });
      var u = c.length;
      return u < 1 ? (this.commonLogger.info("CacheManager:getRefreshToken - No refresh token found."), null) : (this.commonLogger.info("CacheManager:getRefreshToken - returning refresh token"), c[0]);
    }, n.prototype.refreshTokenKeyMatchesFilter = function(e, t) {
      var r = e.toLowerCase();
      return !(t.familyId && r.indexOf(t.familyId.toLowerCase()) === -1 || !t.familyId && t.clientId && r.indexOf(t.clientId.toLowerCase()) === -1 || t.homeAccountId && r.indexOf(t.homeAccountId.toLowerCase()) === -1);
    }, n.prototype.readAppMetadataFromCache = function(e) {
      var t = {
        environment: e,
        clientId: this.clientId
      }, r = this.getAppMetadataFilteredBy(t), o = Object.keys(r).map(function(a) {
        return r[a];
      }), i = o.length;
      if (i < 1)
        return null;
      if (i > 1)
        throw w.createMultipleMatchingAppMetadataInCacheError();
      return o[0];
    }, n.prototype.isAppMetadataFOCI = function(e) {
      var t = this.readAppMetadataFromCache(e);
      return !!(t && t.familyId === ot);
    }, n.prototype.matchHomeAccountId = function(e, t) {
      return typeof e.homeAccountId == "string" && t === e.homeAccountId;
    }, n.prototype.matchLocalAccountId = function(e, t) {
      return typeof e.localAccountId == "string" && t === e.localAccountId;
    }, n.prototype.matchUsername = function(e, t) {
      return typeof e.username == "string" && t.toLowerCase() === e.username.toLowerCase();
    }, n.prototype.matchUserAssertionHash = function(e, t) {
      return !!(e.userAssertionHash && t === e.userAssertionHash);
    }, n.prototype.matchEnvironment = function(e, t) {
      var r = this.getAuthorityMetadataByAlias(t);
      return !!(r && r.aliases.indexOf(e.environment) > -1);
    }, n.prototype.matchCredentialType = function(e, t) {
      return e.credentialType && t.toLowerCase() === e.credentialType.toLowerCase();
    }, n.prototype.matchClientId = function(e, t) {
      return !!(e.clientId && t === e.clientId);
    }, n.prototype.matchFamilyId = function(e, t) {
      return !!(e.familyId && t === e.familyId);
    }, n.prototype.matchRealm = function(e, t) {
      return !!(e.realm && t === e.realm);
    }, n.prototype.matchNativeAccountId = function(e, t) {
      return !!(e.nativeAccountId && t === e.nativeAccountId);
    }, n.prototype.matchTarget = function(e, t) {
      var r = e.credentialType !== M.ACCESS_TOKEN && e.credentialType !== M.ACCESS_TOKEN_WITH_AUTH_SCHEME;
      if (r || !e.target)
        return !1;
      var o = Z.fromString(e.target);
      return o.containsScopeSet(t);
    }, n.prototype.matchTokenType = function(e, t) {
      return !!(e.tokenType && e.tokenType === t);
    }, n.prototype.matchKeyId = function(e, t) {
      return !!(e.keyId && e.keyId === t);
    }, n.prototype.isAppMetadata = function(e) {
      return e.indexOf(Ft) !== -1;
    }, n.prototype.isAuthorityMetadata = function(e) {
      return e.indexOf(it.CACHE_KEY) !== -1;
    }, n.prototype.generateAuthorityMetadataCacheKey = function(e) {
      return it.CACHE_KEY + "-" + this.clientId + "-" + e;
    }, n.toObject = function(e, t) {
      for (var r in t)
        e[r] = t[r];
      return e;
    }, n;
  }()
), rn = (
  /** @class */
  function(n) {
    ue(e, n);
    function e() {
      return n !== null && n.apply(this, arguments) || this;
    }
    return e.prototype.setAccount = function() {
      var t = "Storage interface - setAccount() has not been implemented for the cacheStorage interface.";
      throw k.createUnexpectedError(t);
    }, e.prototype.getAccount = function() {
      var t = "Storage interface - getAccount() has not been implemented for the cacheStorage interface.";
      throw k.createUnexpectedError(t);
    }, e.prototype.setIdTokenCredential = function() {
      var t = "Storage interface - setIdTokenCredential() has not been implemented for the cacheStorage interface.";
      throw k.createUnexpectedError(t);
    }, e.prototype.getIdTokenCredential = function() {
      var t = "Storage interface - getIdTokenCredential() has not been implemented for the cacheStorage interface.";
      throw k.createUnexpectedError(t);
    }, e.prototype.setAccessTokenCredential = function() {
      var t = "Storage interface - setAccessTokenCredential() has not been implemented for the cacheStorage interface.";
      throw k.createUnexpectedError(t);
    }, e.prototype.getAccessTokenCredential = function() {
      var t = "Storage interface - getAccessTokenCredential() has not been implemented for the cacheStorage interface.";
      throw k.createUnexpectedError(t);
    }, e.prototype.setRefreshTokenCredential = function() {
      var t = "Storage interface - setRefreshTokenCredential() has not been implemented for the cacheStorage interface.";
      throw k.createUnexpectedError(t);
    }, e.prototype.getRefreshTokenCredential = function() {
      var t = "Storage interface - getRefreshTokenCredential() has not been implemented for the cacheStorage interface.";
      throw k.createUnexpectedError(t);
    }, e.prototype.setAppMetadata = function() {
      var t = "Storage interface - setAppMetadata() has not been implemented for the cacheStorage interface.";
      throw k.createUnexpectedError(t);
    }, e.prototype.getAppMetadata = function() {
      var t = "Storage interface - getAppMetadata() has not been implemented for the cacheStorage interface.";
      throw k.createUnexpectedError(t);
    }, e.prototype.setServerTelemetry = function() {
      var t = "Storage interface - setServerTelemetry() has not been implemented for the cacheStorage interface.";
      throw k.createUnexpectedError(t);
    }, e.prototype.getServerTelemetry = function() {
      var t = "Storage interface - getServerTelemetry() has not been implemented for the cacheStorage interface.";
      throw k.createUnexpectedError(t);
    }, e.prototype.setAuthorityMetadata = function() {
      var t = "Storage interface - setAuthorityMetadata() has not been implemented for the cacheStorage interface.";
      throw k.createUnexpectedError(t);
    }, e.prototype.getAuthorityMetadata = function() {
      var t = "Storage interface - getAuthorityMetadata() has not been implemented for the cacheStorage interface.";
      throw k.createUnexpectedError(t);
    }, e.prototype.getAuthorityMetadataKeys = function() {
      var t = "Storage interface - getAuthorityMetadataKeys() has not been implemented for the cacheStorage interface.";
      throw k.createUnexpectedError(t);
    }, e.prototype.setThrottlingCache = function() {
      var t = "Storage interface - setThrottlingCache() has not been implemented for the cacheStorage interface.";
      throw k.createUnexpectedError(t);
    }, e.prototype.getThrottlingCache = function() {
      var t = "Storage interface - getThrottlingCache() has not been implemented for the cacheStorage interface.";
      throw k.createUnexpectedError(t);
    }, e.prototype.removeItem = function() {
      var t = "Storage interface - removeItem() has not been implemented for the cacheStorage interface.";
      throw k.createUnexpectedError(t);
    }, e.prototype.containsKey = function() {
      var t = "Storage interface - containsKey() has not been implemented for the cacheStorage interface.";
      throw k.createUnexpectedError(t);
    }, e.prototype.getKeys = function() {
      var t = "Storage interface - getKeys() has not been implemented for the cacheStorage interface.";
      throw k.createUnexpectedError(t);
    }, e.prototype.getAccountKeys = function() {
      var t = "Storage interface - getAccountKeys() has not been implemented for the cacheStorage interface.";
      throw k.createUnexpectedError(t);
    }, e.prototype.getTokenKeys = function() {
      var t = "Storage interface - getTokenKeys() has not been implemented for the cacheStorage interface.";
      throw k.createUnexpectedError(t);
    }, e.prototype.clear = function() {
      return O(this, void 0, void 0, function() {
        var t;
        return U(this, function(r) {
          throw t = "Storage interface - clear() has not been implemented for the cacheStorage interface.", k.createUnexpectedError(t);
        });
      });
    }, e.prototype.updateCredentialCacheKey = function() {
      var t = "Storage interface - updateCredentialCacheKey() has not been implemented for the cacheStorage interface.";
      throw k.createUnexpectedError(t);
    }, e;
  }(ae)
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var nn = 300, Dr = {
  tokenRenewalOffsetSeconds: nn,
  preventCorsPreflight: !1
}, on = {
  loggerCallback: function() {
  },
  piiLoggingEnabled: !1,
  logLevel: z.Info,
  correlationId: h.EMPTY_STRING
}, an = {
  sendGetRequestAsync: function() {
    return O(this, void 0, void 0, function() {
      var n;
      return U(this, function(e) {
        throw n = "Network interface - sendGetRequestAsync() has not been implemented", k.createUnexpectedError(n);
      });
    });
  },
  sendPostRequestAsync: function() {
    return O(this, void 0, void 0, function() {
      var n;
      return U(this, function(e) {
        throw n = "Network interface - sendPostRequestAsync() has not been implemented", k.createUnexpectedError(n);
      });
    });
  }
}, sn = {
  sku: h.SKU,
  version: $t,
  cpu: h.EMPTY_STRING,
  os: h.EMPTY_STRING
}, cn = {
  clientSecret: h.EMPTY_STRING,
  clientAssertion: void 0
}, un = {
  azureCloudInstance: lt.None,
  tenant: "" + h.DEFAULT_COMMON_TENANT
}, ln = {
  application: {
    appName: "",
    appVersion: ""
  }
};
function dn(n) {
  var e = n.authOptions, t = n.systemOptions, r = n.loggerOptions, o = n.storageInterface, i = n.networkInterface, a = n.cryptoInterface, s = n.clientCredentials, c = n.libraryInfo, u = n.telemetry, l = n.serverTelemetryManager, d = n.persistencePlugin, p = n.serializableCache, f = B(B({}, on), r);
  return {
    authOptions: hn(e),
    systemOptions: B(B({}, Dr), t),
    loggerOptions: f,
    storageInterface: o || new rn(e.clientId, It, new Xt(f)),
    networkInterface: i || an,
    cryptoInterface: a || It,
    clientCredentials: s || cn,
    libraryInfo: B(B({}, sn), c),
    telemetry: B(B({}, ln), u),
    serverTelemetryManager: l || null,
    persistencePlugin: d || null,
    serializableCache: p || null
  };
}
function hn(n) {
  return B({ clientCapabilities: [], azureCloudOptions: un, skipAuthorityMetadataCache: !1 }, n);
}
/*! @azure/msal-common v13.0.0 2023-05-01 */
var Be = (
  /** @class */
  function(n) {
    ue(e, n);
    function e(t, r, o) {
      var i = n.call(this, t, r, o) || this;
      return i.name = "ServerError", Object.setPrototypeOf(i, e.prototype), i;
    }
    return e;
  }(k)
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var St = (
  /** @class */
  function() {
    function n() {
    }
    return n.generateThrottlingStorageKey = function(e) {
      return at.THROTTLING_PREFIX + "." + JSON.stringify(e);
    }, n.preProcess = function(e, t) {
      var r, o = n.generateThrottlingStorageKey(t), i = e.getThrottlingCache(o);
      if (i) {
        if (i.throttleTime < Date.now()) {
          e.removeItem(o);
          return;
        }
        throw new Be(((r = i.errorCodes) === null || r === void 0 ? void 0 : r.join(" ")) || h.EMPTY_STRING, i.errorMessage, i.subError);
      }
    }, n.postProcess = function(e, t, r) {
      if (n.checkResponseStatus(r) || n.checkResponseForRetryAfter(r)) {
        var o = {
          throttleTime: n.calculateThrottleTime(parseInt(r.headers[he.RETRY_AFTER])),
          error: r.body.error,
          errorCodes: r.body.error_codes,
          errorMessage: r.body.error_description,
          subError: r.body.suberror
        };
        e.setThrottlingCache(n.generateThrottlingStorageKey(t), o);
      }
    }, n.checkResponseStatus = function(e) {
      return e.status === 429 || e.status >= 500 && e.status < 600;
    }, n.checkResponseForRetryAfter = function(e) {
      return e.headers ? e.headers.hasOwnProperty(he.RETRY_AFTER) && (e.status < 200 || e.status >= 300) : !1;
    }, n.calculateThrottleTime = function(e) {
      var t = e <= 0 ? 0 : e, r = Date.now() / 1e3;
      return Math.floor(Math.min(r + (t || at.DEFAULT_THROTTLE_TIME_SECONDS), r + at.DEFAULT_MAX_THROTTLE_TIME_SECONDS) * 1e3);
    }, n.removeThrottle = function(e, t, r, o) {
      var i = {
        clientId: t,
        authority: r.authority,
        scopes: r.scopes,
        homeAccountIdentifier: o,
        claims: r.claims,
        authenticationScheme: r.authenticationScheme,
        resourceRequestMethod: r.resourceRequestMethod,
        resourceRequestUri: r.resourceRequestUri,
        shrClaims: r.shrClaims,
        sshKid: r.sshKid
      }, a = this.generateThrottlingStorageKey(i);
      e.removeItem(a);
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var pn = (
  /** @class */
  function() {
    function n(e, t) {
      this.networkClient = e, this.cacheManager = t;
    }
    return n.prototype.sendPostRequest = function(e, t, r) {
      return O(this, void 0, void 0, function() {
        var o, i;
        return U(this, function(a) {
          switch (a.label) {
            case 0:
              St.preProcess(this.cacheManager, e), a.label = 1;
            case 1:
              return a.trys.push([1, 3, , 4]), [4, this.networkClient.sendPostRequestAsync(t, r)];
            case 2:
              return o = a.sent(), [3, 4];
            case 3:
              throw i = a.sent(), i instanceof k ? i : w.createNetworkError(t, i);
            case 4:
              return St.postProcess(this.cacheManager, e, o), [2, o];
          }
        });
      });
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var de;
(function(n) {
  n.HOME_ACCOUNT_ID = "home_account_id", n.UPN = "UPN";
})(de || (de = {}));
/*! @azure/msal-common v13.0.0 2023-05-01 */
var He = (
  /** @class */
  function() {
    function n() {
    }
    return n.validateRedirectUri = function(e) {
      if (I.isEmpty(e))
        throw G.createRedirectUriEmptyError();
    }, n.validatePrompt = function(e) {
      var t = [];
      for (var r in ee)
        t.push(ee[r]);
      if (t.indexOf(e) < 0)
        throw G.createInvalidPromptError(e);
    }, n.validateClaims = function(e) {
      try {
        JSON.parse(e);
      } catch {
        throw G.createInvalidClaimsRequestError();
      }
    }, n.validateCodeChallengeParams = function(e, t) {
      if (I.isEmpty(e) || I.isEmpty(t))
        throw G.createInvalidCodeChallengeParamsError();
      this.validateCodeChallengeMethod(t);
    }, n.validateCodeChallengeMethod = function(e) {
      if ([
        cr.PLAIN,
        cr.S256
      ].indexOf(e) < 0)
        throw G.createInvalidCodeChallengeMethodError();
    }, n.sanitizeEQParams = function(e, t) {
      return e ? (t.forEach(function(r, o) {
        e[o] && delete e[o];
      }), Object.fromEntries(Object.entries(e).filter(function(r) {
        var o = r[1];
        return o !== "";
      }))) : {};
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var st = (
  /** @class */
  function() {
    function n() {
      this.parameters = /* @__PURE__ */ new Map();
    }
    return n.prototype.addResponseTypeCode = function() {
      this.parameters.set(L.RESPONSE_TYPE, encodeURIComponent(h.CODE_RESPONSE_TYPE));
    }, n.prototype.addResponseTypeForTokenAndIdToken = function() {
      this.parameters.set(L.RESPONSE_TYPE, encodeURIComponent(h.TOKEN_RESPONSE_TYPE + " " + h.ID_TOKEN_RESPONSE_TYPE));
    }, n.prototype.addResponseMode = function(e) {
      this.parameters.set(L.RESPONSE_MODE, encodeURIComponent(e || Et.QUERY));
    }, n.prototype.addNativeBroker = function() {
      this.parameters.set(L.NATIVE_BROKER, encodeURIComponent("1"));
    }, n.prototype.addScopes = function(e, t) {
      t === void 0 && (t = !0);
      var r = t ? Ot(e || [], pt) : e || [], o = new Z(r);
      this.parameters.set(L.SCOPE, encodeURIComponent(o.printScopes()));
    }, n.prototype.addClientId = function(e) {
      this.parameters.set(L.CLIENT_ID, encodeURIComponent(e));
    }, n.prototype.addRedirectUri = function(e) {
      He.validateRedirectUri(e), this.parameters.set(L.REDIRECT_URI, encodeURIComponent(e));
    }, n.prototype.addPostLogoutRedirectUri = function(e) {
      He.validateRedirectUri(e), this.parameters.set(L.POST_LOGOUT_URI, encodeURIComponent(e));
    }, n.prototype.addIdTokenHint = function(e) {
      this.parameters.set(L.ID_TOKEN_HINT, encodeURIComponent(e));
    }, n.prototype.addDomainHint = function(e) {
      this.parameters.set(nt.DOMAIN_HINT, encodeURIComponent(e));
    }, n.prototype.addLoginHint = function(e) {
      this.parameters.set(nt.LOGIN_HINT, encodeURIComponent(e));
    }, n.prototype.addCcsUpn = function(e) {
      this.parameters.set(he.CCS_HEADER, encodeURIComponent("UPN:" + e));
    }, n.prototype.addCcsOid = function(e) {
      this.parameters.set(he.CCS_HEADER, encodeURIComponent("Oid:" + e.uid + "@" + e.utid));
    }, n.prototype.addSid = function(e) {
      this.parameters.set(nt.SID, encodeURIComponent(e));
    }, n.prototype.addClaims = function(e, t) {
      var r = this.addClientCapabilitiesToClaims(e, t);
      He.validateClaims(r), this.parameters.set(L.CLAIMS, encodeURIComponent(r));
    }, n.prototype.addCorrelationId = function(e) {
      this.parameters.set(L.CLIENT_REQUEST_ID, encodeURIComponent(e));
    }, n.prototype.addLibraryInfo = function(e) {
      this.parameters.set(L.X_CLIENT_SKU, e.sku), this.parameters.set(L.X_CLIENT_VER, e.version), e.os && this.parameters.set(L.X_CLIENT_OS, e.os), e.cpu && this.parameters.set(L.X_CLIENT_CPU, e.cpu);
    }, n.prototype.addApplicationTelemetry = function(e) {
      e != null && e.appName && this.parameters.set(L.X_APP_NAME, e.appName), e != null && e.appVersion && this.parameters.set(L.X_APP_VER, e.appVersion);
    }, n.prototype.addPrompt = function(e) {
      He.validatePrompt(e), this.parameters.set("" + L.PROMPT, encodeURIComponent(e));
    }, n.prototype.addState = function(e) {
      I.isEmpty(e) || this.parameters.set(L.STATE, encodeURIComponent(e));
    }, n.prototype.addNonce = function(e) {
      this.parameters.set(L.NONCE, encodeURIComponent(e));
    }, n.prototype.addCodeChallengeParams = function(e, t) {
      if (He.validateCodeChallengeParams(e, t), e && t)
        this.parameters.set(L.CODE_CHALLENGE, encodeURIComponent(e)), this.parameters.set(L.CODE_CHALLENGE_METHOD, encodeURIComponent(t));
      else
        throw G.createInvalidCodeChallengeParamsError();
    }, n.prototype.addAuthorizationCode = function(e) {
      this.parameters.set(L.CODE, encodeURIComponent(e));
    }, n.prototype.addDeviceCode = function(e) {
      this.parameters.set(L.DEVICE_CODE, encodeURIComponent(e));
    }, n.prototype.addRefreshToken = function(e) {
      this.parameters.set(L.REFRESH_TOKEN, encodeURIComponent(e));
    }, n.prototype.addCodeVerifier = function(e) {
      this.parameters.set(L.CODE_VERIFIER, encodeURIComponent(e));
    }, n.prototype.addClientSecret = function(e) {
      this.parameters.set(L.CLIENT_SECRET, encodeURIComponent(e));
    }, n.prototype.addClientAssertion = function(e) {
      I.isEmpty(e) || this.parameters.set(L.CLIENT_ASSERTION, encodeURIComponent(e));
    }, n.prototype.addClientAssertionType = function(e) {
      I.isEmpty(e) || this.parameters.set(L.CLIENT_ASSERTION_TYPE, encodeURIComponent(e));
    }, n.prototype.addOboAssertion = function(e) {
      this.parameters.set(L.OBO_ASSERTION, encodeURIComponent(e));
    }, n.prototype.addRequestTokenUse = function(e) {
      this.parameters.set(L.REQUESTED_TOKEN_USE, encodeURIComponent(e));
    }, n.prototype.addGrantType = function(e) {
      this.parameters.set(L.GRANT_TYPE, encodeURIComponent(e));
    }, n.prototype.addClientInfo = function() {
      this.parameters.set(tn, "1");
    }, n.prototype.addExtraQueryParameters = function(e) {
      var t = this, r = He.sanitizeEQParams(e, this.parameters);
      Object.keys(r).forEach(function(o) {
        t.parameters.set(o, e[o]);
      });
    }, n.prototype.addClientCapabilitiesToClaims = function(e, t) {
      var r;
      if (!e)
        r = {};
      else
        try {
          r = JSON.parse(e);
        } catch {
          throw G.createInvalidClaimsRequestError();
        }
      return t && t.length > 0 && (r.hasOwnProperty(ze.ACCESS_TOKEN) || (r[ze.ACCESS_TOKEN] = {}), r[ze.ACCESS_TOKEN][ze.XMS_CC] = {
        values: t
      }), JSON.stringify(r);
    }, n.prototype.addUsername = function(e) {
      this.parameters.set(Tt.username, encodeURIComponent(e));
    }, n.prototype.addPassword = function(e) {
      this.parameters.set(Tt.password, encodeURIComponent(e));
    }, n.prototype.addPopToken = function(e) {
      I.isEmpty(e) || (this.parameters.set(L.TOKEN_TYPE, K.POP), this.parameters.set(L.REQ_CNF, encodeURIComponent(e)));
    }, n.prototype.addSshJwk = function(e) {
      I.isEmpty(e) || (this.parameters.set(L.TOKEN_TYPE, K.SSH), this.parameters.set(L.REQ_CNF, encodeURIComponent(e)));
    }, n.prototype.addServerTelemetry = function(e) {
      this.parameters.set(L.X_CLIENT_CURR_TELEM, e.generateCurrentRequestHeaderValue()), this.parameters.set(L.X_CLIENT_LAST_TELEM, e.generateLastRequestHeaderValue());
    }, n.prototype.addThrottling = function() {
      this.parameters.set(L.X_MS_LIB_CAPABILITY, at.X_MS_LIB_CAPABILITY_VALUE);
    }, n.prototype.addLogoutHint = function(e) {
      this.parameters.set(L.LOGOUT_HINT, encodeURIComponent(e));
    }, n.prototype.createQueryString = function() {
      var e = new Array();
      return this.parameters.forEach(function(t, r) {
        e.push(r + "=" + t);
      }), e.join("&");
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var Zt = (
  /** @class */
  function() {
    function n(e, t) {
      this.config = dn(e), this.logger = new Xt(this.config.loggerOptions, Lr, $t), this.cryptoUtils = this.config.cryptoInterface, this.cacheManager = this.config.storageInterface, this.networkClient = this.config.networkInterface, this.networkManager = new pn(this.networkClient, this.cacheManager), this.serverTelemetryManager = this.config.serverTelemetryManager, this.authority = this.config.authOptions.authority, this.performanceClient = t;
    }
    return n.prototype.createTokenRequestHeaders = function(e) {
      var t = {};
      if (t[he.CONTENT_TYPE] = h.URL_FORM_CONTENT_TYPE, !this.config.systemOptions.preventCorsPreflight && e)
        switch (e.type) {
          case de.HOME_ACCOUNT_ID:
            try {
              var r = Qe(e.credential);
              t[he.CCS_HEADER] = "Oid:" + r.uid + "@" + r.utid;
            } catch (o) {
              this.logger.verbose("Could not parse home account ID for CCS Header: " + o);
            }
            break;
          case de.UPN:
            t[he.CCS_HEADER] = "UPN: " + e.credential;
            break;
        }
      return t;
    }, n.prototype.executePostToTokenEndpoint = function(e, t, r, o) {
      return O(this, void 0, void 0, function() {
        var i;
        return U(this, function(a) {
          switch (a.label) {
            case 0:
              return [4, this.networkManager.sendPostRequest(o, e, { body: t, headers: r })];
            case 1:
              return i = a.sent(), this.config.serverTelemetryManager && i.status < 500 && i.status !== 429 && this.config.serverTelemetryManager.clearTelemetryCache(), [2, i];
          }
        });
      });
    }, n.prototype.updateAuthority = function(e) {
      if (!e.discoveryComplete())
        throw w.createEndpointDiscoveryIncompleteError("Updated authority has not completed endpoint discovery.");
      this.authority = e;
    }, n.prototype.createTokenQueryParameters = function(e) {
      var t = new st();
      return e.tokenQueryParameters && t.addExtraQueryParameters(e.tokenQueryParameters), t.createQueryString();
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var er = (
  /** @class */
  function() {
    function n() {
    }
    return n.prototype.generateAccountId = function() {
      return n.generateAccountIdForCacheKey(this.homeAccountId, this.environment);
    }, n.prototype.generateCredentialId = function() {
      return n.generateCredentialIdForCacheKey(this.credentialType, this.clientId, this.realm, this.familyId);
    }, n.prototype.generateTarget = function() {
      return n.generateTargetForCacheKey(this.target);
    }, n.prototype.generateCredentialKey = function() {
      return n.generateCredentialCacheKey(this.homeAccountId, this.environment, this.credentialType, this.clientId, this.realm, this.target, this.familyId, this.tokenType, this.requestedClaimsHash);
    }, n.prototype.generateType = function() {
      switch (this.credentialType) {
        case M.ID_TOKEN:
          return Ae.ID_TOKEN;
        case M.ACCESS_TOKEN:
        case M.ACCESS_TOKEN_WITH_AUTH_SCHEME:
          return Ae.ACCESS_TOKEN;
        case M.REFRESH_TOKEN:
          return Ae.REFRESH_TOKEN;
        default:
          throw w.createUnexpectedCredentialTypeError();
      }
    }, n.generateCredentialCacheKey = function(e, t, r, o, i, a, s, c, u) {
      var l = [
        this.generateAccountIdForCacheKey(e, t),
        this.generateCredentialIdForCacheKey(r, o, i, s),
        this.generateTargetForCacheKey(a),
        this.generateClaimsHashForCacheKey(u),
        this.generateSchemeForCacheKey(c)
      ];
      return l.join(V.CACHE_KEY_SEPARATOR).toLowerCase();
    }, n.generateAccountIdForCacheKey = function(e, t) {
      var r = [e, t];
      return r.join(V.CACHE_KEY_SEPARATOR).toLowerCase();
    }, n.generateCredentialIdForCacheKey = function(e, t, r, o) {
      var i = e === M.REFRESH_TOKEN && o || t, a = [
        e,
        i,
        r || h.EMPTY_STRING
      ];
      return a.join(V.CACHE_KEY_SEPARATOR).toLowerCase();
    }, n.generateTargetForCacheKey = function(e) {
      return (e || h.EMPTY_STRING).toLowerCase();
    }, n.generateClaimsHashForCacheKey = function(e) {
      return (e || h.EMPTY_STRING).toLowerCase();
    }, n.generateSchemeForCacheKey = function(e) {
      return e && e.toLowerCase() !== K.BEARER.toLowerCase() ? e.toLowerCase() : h.EMPTY_STRING;
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var Fe = (
  /** @class */
  function(n) {
    ue(e, n);
    function e() {
      return n !== null && n.apply(this, arguments) || this;
    }
    return e.createIdTokenEntity = function(t, r, o, i, a) {
      var s = new e();
      return s.credentialType = M.ID_TOKEN, s.homeAccountId = t, s.environment = r, s.clientId = i, s.secret = o, s.realm = a, s;
    }, e.isIdTokenEntity = function(t) {
      return t ? t.hasOwnProperty("homeAccountId") && t.hasOwnProperty("environment") && t.hasOwnProperty("credentialType") && t.hasOwnProperty("realm") && t.hasOwnProperty("clientId") && t.hasOwnProperty("secret") && t.credentialType === M.ID_TOKEN : !1;
    }, e;
  }(er)
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var fe = (
  /** @class */
  function() {
    function n() {
    }
    return n.nowSeconds = function() {
      return Math.round((/* @__PURE__ */ new Date()).getTime() / 1e3);
    }, n.isTokenExpired = function(e, t) {
      var r = Number(e) || 0, o = n.nowSeconds() + t;
      return o > r;
    }, n.wasClockTurnedBack = function(e) {
      var t = Number(e);
      return t > n.nowSeconds();
    }, n.delay = function(e, t) {
      return new Promise(function(r) {
        return setTimeout(function() {
          return r(t);
        }, e);
      });
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var xe = (
  /** @class */
  function(n) {
    ue(e, n);
    function e() {
      return n !== null && n.apply(this, arguments) || this;
    }
    return e.createAccessTokenEntity = function(t, r, o, i, a, s, c, u, l, d, p, f, m, C, R) {
      var b, N, D = new e();
      D.homeAccountId = t, D.credentialType = M.ACCESS_TOKEN, D.secret = o;
      var Ee = fe.nowSeconds();
      if (D.cachedAt = Ee.toString(), D.expiresOn = c.toString(), D.extendedExpiresOn = u.toString(), d && (D.refreshOn = d.toString()), D.environment = r, D.clientId = i, D.realm = a, D.target = s, D.userAssertionHash = f, D.tokenType = I.isEmpty(p) ? K.BEARER : p, C && (D.requestedClaims = C, D.requestedClaimsHash = R), ((b = D.tokenType) === null || b === void 0 ? void 0 : b.toLowerCase()) !== K.BEARER.toLowerCase())
        switch (D.credentialType = M.ACCESS_TOKEN_WITH_AUTH_SCHEME, D.tokenType) {
          case K.POP:
            var me = we.extractTokenClaims(o, l);
            if (!(!((N = me == null ? void 0 : me.cnf) === null || N === void 0) && N.kid))
              throw w.createTokenClaimsRequiredError();
            D.keyId = me.cnf.kid;
            break;
          case K.SSH:
            D.keyId = m;
        }
      return D;
    }, e.isAccessTokenEntity = function(t) {
      return t ? t.hasOwnProperty("homeAccountId") && t.hasOwnProperty("environment") && t.hasOwnProperty("credentialType") && t.hasOwnProperty("realm") && t.hasOwnProperty("clientId") && t.hasOwnProperty("secret") && t.hasOwnProperty("target") && (t.credentialType === M.ACCESS_TOKEN || t.credentialType === M.ACCESS_TOKEN_WITH_AUTH_SCHEME) : !1;
    }, e;
  }(er)
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var je = (
  /** @class */
  function(n) {
    ue(e, n);
    function e() {
      return n !== null && n.apply(this, arguments) || this;
    }
    return e.createRefreshTokenEntity = function(t, r, o, i, a, s) {
      var c = new e();
      return c.clientId = i, c.credentialType = M.REFRESH_TOKEN, c.environment = r, c.homeAccountId = t, c.secret = o, c.userAssertionHash = s, a && (c.familyId = a), c;
    }, e.isRefreshTokenEntity = function(t) {
      return t ? t.hasOwnProperty("homeAccountId") && t.hasOwnProperty("environment") && t.hasOwnProperty("credentialType") && t.hasOwnProperty("clientId") && t.hasOwnProperty("secret") && t.credentialType === M.REFRESH_TOKEN : !1;
    }, e;
  }(er)
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var lr = [
  "interaction_required",
  "consent_required",
  "login_required"
], fn = [
  "message_only",
  "additional_action",
  "basic_action",
  "user_password_expired",
  "consent_required"
], tt = {
  noTokensFoundError: {
    code: "no_tokens_found",
    desc: "No refresh token found in the cache. Please sign-in."
  },
  native_account_unavailable: {
    code: "native_account_unavailable",
    desc: "The requested account is not available in the native broker. It may have been deleted or logged out. Please sign-in again using an interactive API."
  }
}, ye = (
  /** @class */
  function(n) {
    ue(e, n);
    function e(t, r, o, i, a, s, c) {
      var u = n.call(this, t, r, o) || this;
      return Object.setPrototypeOf(u, e.prototype), u.timestamp = i || h.EMPTY_STRING, u.traceId = a || h.EMPTY_STRING, u.correlationId = s || h.EMPTY_STRING, u.claims = c || h.EMPTY_STRING, u.name = "InteractionRequiredAuthError", u;
    }
    return e.isInteractionRequiredError = function(t, r, o) {
      var i = !!t && lr.indexOf(t) > -1, a = !!o && fn.indexOf(o) > -1, s = !!r && lr.some(function(c) {
        return r.indexOf(c) > -1;
      });
      return i || s || a;
    }, e.createNoTokensFoundError = function() {
      return new e(tt.noTokensFoundError.code, tt.noTokensFoundError.desc);
    }, e.createNativeAccountUnavailableError = function() {
      return new e(tt.native_account_unavailable.code, tt.native_account_unavailable.desc);
    }, e;
  }(k)
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var yt = (
  /** @class */
  function() {
    function n(e, t, r, o, i) {
      this.account = e || null, this.idToken = t || null, this.accessToken = r || null, this.refreshToken = o || null, this.appMetadata = i || null;
    }
    return n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var be = (
  /** @class */
  function() {
    function n() {
    }
    return n.setRequestState = function(e, t, r) {
      var o = n.generateLibraryState(e, r);
      return I.isEmpty(t) ? o : "" + o + h.RESOURCE_DELIM + t;
    }, n.generateLibraryState = function(e, t) {
      if (!e)
        throw w.createNoCryptoObjectError("generateLibraryState");
      var r = {
        id: e.createNewGuid()
      };
      t && (r.meta = t);
      var o = JSON.stringify(r);
      return e.base64Encode(o);
    }, n.parseRequestState = function(e, t) {
      if (!e)
        throw w.createNoCryptoObjectError("parseRequestState");
      if (I.isEmpty(t))
        throw w.createInvalidStateError(t, "Null, undefined or empty state");
      try {
        var r = t.split(h.RESOURCE_DELIM), o = r[0], i = r.length > 1 ? r.slice(1).join(h.RESOURCE_DELIM) : h.EMPTY_STRING, a = e.base64Decode(o), s = JSON.parse(a);
        return {
          userRequestState: I.isEmpty(i) ? h.EMPTY_STRING : i,
          libraryState: s
        };
      } catch (c) {
        throw w.createInvalidStateError(t, c);
      }
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var F = (
  /** @class */
  function() {
    function n(e) {
      if (this._urlString = e, I.isEmpty(this._urlString))
        throw G.createUrlEmptyError();
      I.isEmpty(this.getHash()) && (this._urlString = n.canonicalizeUri(e));
    }
    return Object.defineProperty(n.prototype, "urlString", {
      get: function() {
        return this._urlString;
      },
      enumerable: !1,
      configurable: !0
    }), n.canonicalizeUri = function(e) {
      if (e) {
        var t = e.toLowerCase();
        return I.endsWith(t, "?") ? t = t.slice(0, -1) : I.endsWith(t, "?/") && (t = t.slice(0, -2)), I.endsWith(t, "/") || (t += "/"), t;
      }
      return e;
    }, n.prototype.validateAsUri = function() {
      var e;
      try {
        e = this.getUrlComponents();
      } catch (t) {
        throw G.createUrlParseError(t);
      }
      if (!e.HostNameAndPort || !e.PathSegments)
        throw G.createUrlParseError("Given url string: " + this.urlString);
      if (!e.Protocol || e.Protocol.toLowerCase() !== "https:")
        throw G.createInsecureAuthorityUriError(this.urlString);
    }, n.appendQueryString = function(e, t) {
      return I.isEmpty(t) ? e : e.indexOf("?") < 0 ? e + "?" + t : e + "&" + t;
    }, n.removeHashFromUrl = function(e) {
      return n.canonicalizeUri(e.split("#")[0]);
    }, n.prototype.replaceTenantPath = function(e) {
      var t = this.getUrlComponents(), r = t.PathSegments;
      return e && r.length !== 0 && (r[0] === Ct.COMMON || r[0] === Ct.ORGANIZATIONS) && (r[0] = e), n.constructAuthorityUriFromObject(t);
    }, n.prototype.getHash = function() {
      return n.parseHash(this.urlString);
    }, n.prototype.getUrlComponents = function() {
      var e = RegExp("^(([^:/?#]+):)?(//([^/?#]*))?([^?#]*)(\\?([^#]*))?(#(.*))?"), t = this.urlString.match(e);
      if (!t)
        throw G.createUrlParseError("Given url string: " + this.urlString);
      var r = {
        Protocol: t[1],
        HostNameAndPort: t[4],
        AbsolutePath: t[5],
        QueryString: t[7]
      }, o = r.AbsolutePath.split("/");
      return o = o.filter(function(i) {
        return i && i.length > 0;
      }), r.PathSegments = o, !I.isEmpty(r.QueryString) && r.QueryString.endsWith("/") && (r.QueryString = r.QueryString.substring(0, r.QueryString.length - 1)), r;
    }, n.getDomainFromUrl = function(e) {
      var t = RegExp("^([^:/?#]+://)?([^/?#]*)"), r = e.match(t);
      if (!r)
        throw G.createUrlParseError("Given url string: " + e);
      return r[2];
    }, n.getAbsoluteUrl = function(e, t) {
      if (e[0] === h.FORWARD_SLASH) {
        var r = new n(t), o = r.getUrlComponents();
        return o.Protocol + "//" + o.HostNameAndPort + e;
      }
      return e;
    }, n.parseHash = function(e) {
      var t = e.indexOf("#"), r = e.indexOf("#/");
      return r > -1 ? e.substring(r + 2) : t > -1 ? e.substring(t + 1) : h.EMPTY_STRING;
    }, n.parseQueryString = function(e) {
      var t = e.indexOf("?"), r = e.indexOf("/?");
      return r > -1 ? e.substring(r + 2) : t > -1 ? e.substring(t + 1) : h.EMPTY_STRING;
    }, n.constructAuthorityUriFromObject = function(e) {
      return new n(e.Protocol + "//" + e.HostNameAndPort + "/" + e.PathSegments.join("/"));
    }, n.getDeserializedHash = function(e) {
      if (I.isEmpty(e))
        return {};
      var t = n.parseHash(e), r = I.queryStringToObject(I.isEmpty(t) ? e : t);
      if (!r)
        throw w.createHashNotDeserializedError(JSON.stringify(r));
      return r;
    }, n.getDeserializedQueryString = function(e) {
      if (I.isEmpty(e))
        return {};
      var t = n.parseQueryString(e), r = I.queryStringToObject(I.isEmpty(t) ? e : t);
      if (!r)
        throw w.createHashNotDeserializedError(JSON.stringify(r));
      return r;
    }, n.hashContainsKnownProperties = function(e) {
      if (I.isEmpty(e) || e.indexOf("=") < 0)
        return !1;
      var t = n.getDeserializedHash(e);
      return !!(t.code || t.error_description || t.error || t.state);
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var g;
(function(n) {
  n.AcquireTokenByCode = "acquireTokenByCode", n.AcquireTokenByRefreshToken = "acquireTokenByRefreshToken", n.AcquireTokenSilent = "acquireTokenSilent", n.AcquireTokenSilentAsync = "acquireTokenSilentAsync", n.AcquireTokenPopup = "acquireTokenPopup", n.CryptoOptsGetPublicKeyThumbprint = "cryptoOptsGetPublicKeyThumbprint", n.CryptoOptsSignJwt = "cryptoOptsSignJwt", n.SilentCacheClientAcquireToken = "silentCacheClientAcquireToken", n.SilentIframeClientAcquireToken = "silentIframeClientAcquireToken", n.SilentRefreshClientAcquireToken = "silentRefreshClientAcquireToken", n.SsoSilent = "ssoSilent", n.StandardInteractionClientGetDiscoveredAuthority = "standardInteractionClientGetDiscoveredAuthority", n.FetchAccountIdWithNativeBroker = "fetchAccountIdWithNativeBroker", n.NativeInteractionClientAcquireToken = "nativeInteractionClientAcquireToken", n.BaseClientCreateTokenRequestHeaders = "baseClientCreateTokenRequestHeaders", n.BrokerHandhshake = "brokerHandshake", n.AcquireTokenByRefreshTokenInBroker = "acquireTokenByRefreshTokenInBroker", n.AcquireTokenByBroker = "acquireTokenByBroker", n.RefreshTokenClientExecuteTokenRequest = "refreshTokenClientExecuteTokenRequest", n.RefreshTokenClientAcquireToken = "refreshTokenClientAcquireToken", n.RefreshTokenClientAcquireTokenWithCachedRefreshToken = "refreshTokenClientAcquireTokenWithCachedRefreshToken", n.RefreshTokenClientAcquireTokenByRefreshToken = "refreshTokenClientAcquireTokenByRefreshToken", n.RefreshTokenClientCreateTokenRequestBody = "refreshTokenClientCreateTokenRequestBody", n.AcquireTokenFromCache = "acquireTokenFromCache", n.AcquireTokenBySilentIframe = "acquireTokenBySilentIframe", n.InitializeBaseRequest = "initializeBaseRequest", n.InitializeSilentRequest = "initializeSilentRequest", n.InitializeClientApplication = "initializeClientApplication", n.SilentIframeClientTokenHelper = "silentIframeClientTokenHelper", n.SilentHandlerInitiateAuthRequest = "silentHandlerInitiateAuthRequest", n.SilentHandlerMonitorIframeForHash = "silentHandlerMonitorIframeForHash", n.SilentHandlerLoadFrame = "silentHandlerLoadFrame", n.StandardInteractionClientCreateAuthCodeClient = "standardInteractionClientCreateAuthCodeClient", n.StandardInteractionClientGetClientConfiguration = "standardInteractionClientGetClientConfiguration", n.StandardInteractionClientInitializeAuthorizationRequest = "standardInteractionClientInitializeAuthorizationRequest", n.StandardInteractionClientInitializeAuthorizationCodeRequest = "standardInteractionClientInitializeAuthorizationCodeRequest", n.GetAuthCodeUrl = "getAuthCodeUrl", n.HandleCodeResponseFromServer = "handleCodeResponseFromServer", n.HandleCodeResponseFromHash = "handleCodeResponseFromHash", n.UpdateTokenEndpointAuthority = "updateTokenEndpointAuthority", n.AuthClientAcquireToken = "authClientAcquireToken", n.AuthClientExecuteTokenRequest = "authClientExecuteTokenRequest", n.AuthClientCreateTokenRequestBody = "authClientCreateTokenRequestBody", n.AuthClientCreateQueryString = "authClientCreateQueryString", n.PopTokenGenerateCnf = "popTokenGenerateCnf", n.PopTokenGenerateKid = "popTokenGenerateKid", n.HandleServerTokenResponse = "handleServerTokenResponse", n.AuthorityFactoryCreateDiscoveredInstance = "authorityFactoryCreateDiscoveredInstance", n.AuthorityResolveEndpointsAsync = "authorityResolveEndpointsAsync", n.AuthorityGetCloudDiscoveryMetadataFromNetwork = "authorityGetCloudDiscoveryMetadataFromNetwork", n.AuthorityUpdateCloudDiscoveryMetadata = "authorityUpdateCloudDiscoveryMetadata", n.AuthorityGetEndpointMetadataFromNetwork = "authorityGetEndpointMetadataFromNetwork", n.AuthorityUpdateEndpointMetadata = "authorityUpdateEndpointMetadata", n.AuthorityUpdateMetadataWithRegionalInformation = "authorityUpdateMetadataWithRegionalInformation", n.RegionDiscoveryDetectRegion = "regionDiscoveryDetectRegion", n.RegionDiscoveryGetRegionFromIMDS = "regionDiscoveryGetRegionFromIMDS", n.RegionDiscoveryGetCurrentVersion = "regionDiscoveryGetCurrentVersion", n.AcquireTokenByCodeAsync = "acquireTokenByCodeAsync", n.GetEndpointMetadataFromNetwork = "getEndpointMetadataFromNetwork", n.GetCloudDiscoveryMetadataFromNetworkMeasurement = "getCloudDiscoveryMetadataFromNetworkMeasurement", n.HandleRedirectPromiseMeasurement = "handleRedirectPromiseMeasurement", n.UpdateCloudDiscoveryMetadataMeasurement = "updateCloudDiscoveryMetadataMeasurement", n.UsernamePasswordClientAcquireToken = "usernamePasswordClientAcquireToken", n.NativeMessageHandlerHandshake = "nativeMessageHandlerHandshake";
})(g || (g = {}));
var At;
(function(n) {
  n[n.NotStarted = 0] = "NotStarted", n[n.InProgress = 1] = "InProgress", n[n.Completed = 2] = "Completed";
})(At || (At = {}));
var gn = /* @__PURE__ */ new Set([
  "accessTokenSize",
  "durationMs",
  "idTokenSize",
  "matsSilentStatus",
  "matsHttpStatus",
  "refreshTokenSize",
  "queuedTimeMs",
  "startTimeMs",
  "status"
]);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var Kt;
(function(n) {
  n.SW = "sw", n.UHW = "uhw";
})(Kt || (Kt = {}));
var Xe = (
  /** @class */
  function() {
    function n(e, t) {
      this.cryptoUtils = e, this.performanceClient = t;
    }
    return n.prototype.generateCnf = function(e) {
      var t, r;
      return O(this, void 0, void 0, function() {
        var o, i, a;
        return U(this, function(s) {
          switch (s.label) {
            case 0:
              return (t = this.performanceClient) === null || t === void 0 || t.addQueueMeasurement(g.PopTokenGenerateCnf, e.correlationId), (r = this.performanceClient) === null || r === void 0 || r.setPreQueueTime(g.PopTokenGenerateKid, e.correlationId), [4, this.generateKid(e)];
            case 1:
              return o = s.sent(), i = this.cryptoUtils.base64Encode(JSON.stringify(o)), a = {
                kid: o.kid,
                reqCnfString: i
              }, [4, this.cryptoUtils.hashString(i)];
            case 2:
              return [2, (a.reqCnfHash = s.sent(), a)];
          }
        });
      });
    }, n.prototype.generateKid = function(e) {
      var t;
      return O(this, void 0, void 0, function() {
        var r;
        return U(this, function(o) {
          switch (o.label) {
            case 0:
              return (t = this.performanceClient) === null || t === void 0 || t.addQueueMeasurement(g.PopTokenGenerateKid, e.correlationId), [4, this.cryptoUtils.getPublicKeyThumbprint(e)];
            case 1:
              return r = o.sent(), [2, {
                kid: r,
                xms_ksl: Kt.SW
              }];
          }
        });
      });
    }, n.prototype.signPopToken = function(e, t, r) {
      return O(this, void 0, void 0, function() {
        return U(this, function(o) {
          return [2, this.signPayload(e, t, r)];
        });
      });
    }, n.prototype.signPayload = function(e, t, r, o) {
      return O(this, void 0, void 0, function() {
        var i, a, s, c, u, l;
        return U(this, function(d) {
          switch (d.label) {
            case 0:
              return i = r.resourceRequestMethod, a = r.resourceRequestUri, s = r.shrClaims, c = r.shrNonce, u = a ? new F(a) : void 0, l = u == null ? void 0 : u.getUrlComponents(), [4, this.cryptoUtils.signJwt(B({ at: e, ts: fe.nowSeconds(), m: i == null ? void 0 : i.toUpperCase(), u: l == null ? void 0 : l.HostNameAndPort, nonce: c || this.cryptoUtils.createNewGuid(), p: l == null ? void 0 : l.AbsolutePath, q: l != null && l.QueryString ? [[], l.QueryString] : void 0, client_claims: s || void 0 }, o), t, r.correlationId)];
            case 1:
              return [2, d.sent()];
          }
        });
      });
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var Bt = (
  /** @class */
  function() {
    function n() {
    }
    return n.prototype.generateAppMetadataKey = function() {
      return n.generateAppMetadataCacheKey(this.environment, this.clientId);
    }, n.generateAppMetadataCacheKey = function(e, t) {
      var r = [
        Ft,
        e,
        t
      ];
      return r.join(V.CACHE_KEY_SEPARATOR).toLowerCase();
    }, n.createAppMetadataEntity = function(e, t, r) {
      var o = new n();
      return o.clientId = e, o.environment = t, r && (o.familyId = r), o;
    }, n.isAppMetadataEntity = function(e, t) {
      return t ? e.indexOf(Ft) === 0 && t.hasOwnProperty("clientId") && t.hasOwnProperty("environment") : !1;
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var mn = (
  /** @class */
  function() {
    function n(e, t) {
      this.cache = e, this.hasChanged = t;
    }
    return Object.defineProperty(n.prototype, "cacheHasChanged", {
      /**
       * boolean which indicates the changes in cache
       */
      get: function() {
        return this.hasChanged;
      },
      enumerable: !1,
      configurable: !0
    }), Object.defineProperty(n.prototype, "tokenCache", {
      /**
       * function to retrieve the token cache
       */
      get: function() {
        return this.cache;
      },
      enumerable: !1,
      configurable: !0
    }), n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var kt = (
  /** @class */
  function() {
    function n(e, t, r, o, i, a, s) {
      this.clientId = e, this.cacheStorage = t, this.cryptoObj = r, this.logger = o, this.serializableCache = i, this.persistencePlugin = a, this.performanceClient = s;
    }
    return n.prototype.validateServerAuthorizationCodeResponse = function(e, t, r) {
      if (!e.state || !t)
        throw e.state ? w.createStateNotFoundError("Cached State") : w.createStateNotFoundError("Server State");
      if (decodeURIComponent(e.state) !== decodeURIComponent(t))
        throw w.createStateMismatchError();
      if (e.error || e.error_description || e.suberror)
        throw ye.isInteractionRequiredError(e.error, e.error_description, e.suberror) ? new ye(e.error || h.EMPTY_STRING, e.error_description, e.suberror, e.timestamp || h.EMPTY_STRING, e.trace_id || h.EMPTY_STRING, e.correlation_id || h.EMPTY_STRING, e.claims || h.EMPTY_STRING) : new Be(e.error || h.EMPTY_STRING, e.error_description, e.suberror);
      e.client_info && wt(e.client_info, r);
    }, n.prototype.validateTokenResponse = function(e) {
      if (e.error || e.error_description || e.suberror) {
        if (ye.isInteractionRequiredError(e.error, e.error_description, e.suberror))
          throw new ye(e.error, e.error_description, e.suberror, e.timestamp || h.EMPTY_STRING, e.trace_id || h.EMPTY_STRING, e.correlation_id || h.EMPTY_STRING, e.claims || h.EMPTY_STRING);
        var t = e.error_codes + " - [" + e.timestamp + "]: " + e.error_description + " - Correlation ID: " + e.correlation_id + " - Trace ID: " + e.trace_id;
        throw new Be(e.error, t, e.suberror);
      }
    }, n.prototype.handleServerTokenResponse = function(e, t, r, o, i, a, s, c, u) {
      var l;
      return O(this, void 0, void 0, function() {
        var d, p, f, m, C, R, b;
        return U(this, function(N) {
          switch (N.label) {
            case 0:
              if ((l = this.performanceClient) === null || l === void 0 || l.addQueueMeasurement(g.HandleServerTokenResponse, e.correlation_id), e.id_token) {
                if (d = new we(e.id_token || h.EMPTY_STRING, this.cryptoObj), i && !I.isEmpty(i.nonce) && d.claims.nonce !== i.nonce)
                  throw w.createNonceMismatchError();
                if (o.maxAge || o.maxAge === 0) {
                  if (p = d.claims.auth_time, !p)
                    throw w.createAuthTimeNotFoundError();
                  we.checkMaxAge(p, o.maxAge);
                }
              }
              this.homeAccountIdentifier = J.generateHomeAccountId(e.client_info || h.EMPTY_STRING, t.authorityType, this.logger, this.cryptoObj, d), i && i.state && (f = be.parseRequestState(this.cryptoObj, i.state)), e.key_id = e.key_id || o.sshKid || void 0, m = this.generateCacheRecord(e, t, r, o, d, a, i), N.label = 1;
            case 1:
              return N.trys.push([1, , 5, 8]), this.persistencePlugin && this.serializableCache ? (this.logger.verbose("Persistence enabled, calling beforeCacheAccess"), C = new mn(this.serializableCache, !0), [4, this.persistencePlugin.beforeCacheAccess(C)]) : [3, 3];
            case 2:
              N.sent(), N.label = 3;
            case 3:
              return s && !c && m.account && (R = m.account.generateAccountKey(), b = this.cacheStorage.getAccount(R), !b) ? (this.logger.warning("Account used to refresh tokens not in persistence, refreshed tokens will not be stored in the cache"), [2, n.generateAuthenticationResult(this.cryptoObj, t, m, !1, o, d, f, void 0, u)]) : [4, this.cacheStorage.saveCacheRecord(m)];
            case 4:
              return N.sent(), [3, 8];
            case 5:
              return this.persistencePlugin && this.serializableCache && C ? (this.logger.verbose("Persistence enabled, calling afterCacheAccess"), [4, this.persistencePlugin.afterCacheAccess(C)]) : [3, 7];
            case 6:
              N.sent(), N.label = 7;
            case 7:
              return [
                7
                /*endfinally*/
              ];
            case 8:
              return [2, n.generateAuthenticationResult(this.cryptoObj, t, m, !1, o, d, f, e, u)];
          }
        });
      });
    }, n.prototype.generateCacheRecord = function(e, t, r, o, i, a, s) {
      var c = t.getPreferredCache();
      if (I.isEmpty(c))
        throw w.createInvalidCacheEnvironmentError();
      var u, l;
      !I.isEmpty(e.id_token) && i && (u = Fe.createIdTokenEntity(this.homeAccountIdentifier, c, e.id_token || h.EMPTY_STRING, this.clientId, i.claims.tid || h.EMPTY_STRING), l = this.generateAccountEntity(e, i, t, s));
      var d = null;
      if (!I.isEmpty(e.access_token)) {
        var p = e.scope ? Z.fromString(e.scope) : new Z(o.scopes || []), f = (typeof e.expires_in == "string" ? parseInt(e.expires_in, 10) : e.expires_in) || 0, m = (typeof e.ext_expires_in == "string" ? parseInt(e.ext_expires_in, 10) : e.ext_expires_in) || 0, C = (typeof e.refresh_in == "string" ? parseInt(e.refresh_in, 10) : e.refresh_in) || void 0, R = r + f, b = R + m, N = C && C > 0 ? r + C : void 0;
        d = xe.createAccessTokenEntity(this.homeAccountIdentifier, c, e.access_token || h.EMPTY_STRING, this.clientId, i ? i.claims.tid || h.EMPTY_STRING : t.tenant, p.printScopes(), R, b, this.cryptoObj, N, e.token_type, a, e.key_id, o.claims, o.requestedClaimsHash);
      }
      var D = null;
      I.isEmpty(e.refresh_token) || (D = je.createRefreshTokenEntity(this.homeAccountIdentifier, c, e.refresh_token || h.EMPTY_STRING, this.clientId, e.foci, a));
      var Ee = null;
      return I.isEmpty(e.foci) || (Ee = Bt.createAppMetadataEntity(this.clientId, c, e.foci)), new yt(l, u, d, D, Ee);
    }, n.prototype.generateAccountEntity = function(e, t, r, o) {
      var i = r.authorityType, a = o ? o.cloud_graph_host_name : h.EMPTY_STRING, s = o ? o.msgraph_host : h.EMPTY_STRING;
      if (i === se.Adfs)
        return this.logger.verbose("Authority type is ADFS, creating ADFS account"), J.createGenericAccount(this.homeAccountIdentifier, t, r, a, s);
      if (I.isEmpty(e.client_info) && r.protocolMode === "AAD")
        throw w.createClientInfoEmptyError();
      return e.client_info ? J.createAccount(e.client_info, this.homeAccountIdentifier, t, r, a, s) : J.createGenericAccount(this.homeAccountIdentifier, t, r, a, s);
    }, n.generateAuthenticationResult = function(e, t, r, o, i, a, s, c, u) {
      var l, d, p;
      return O(this, void 0, void 0, function() {
        var f, m, C, R, b, N, D, Ee, me, Ne, gt;
        return U(this, function(re) {
          switch (re.label) {
            case 0:
              if (f = h.EMPTY_STRING, m = [], C = null, b = h.EMPTY_STRING, !r.accessToken)
                return [3, 4];
              if (r.accessToken.tokenType !== K.POP)
                return [3, 2];
              if (N = new Xe(e), D = r.accessToken, Ee = D.secret, me = D.keyId, !me)
                throw w.createKeyIdMissingError();
              return [4, N.signPopToken(Ee, me, i)];
            case 1:
              return f = re.sent(), [3, 3];
            case 2:
              f = r.accessToken.secret, re.label = 3;
            case 3:
              m = Z.fromString(r.accessToken.target).asArray(), C = new Date(Number(r.accessToken.expiresOn) * 1e3), R = new Date(Number(r.accessToken.extendedExpiresOn) * 1e3), re.label = 4;
            case 4:
              return r.appMetadata && (b = r.appMetadata.familyId === ot ? ot : h.EMPTY_STRING), Ne = (a == null ? void 0 : a.claims.oid) || (a == null ? void 0 : a.claims.sub) || h.EMPTY_STRING, gt = (a == null ? void 0 : a.claims.tid) || h.EMPTY_STRING, c != null && c.spa_accountid && r.account && (r.account.nativeAccountId = c == null ? void 0 : c.spa_accountid), [2, {
                authority: t.canonicalAuthority,
                uniqueId: Ne,
                tenantId: gt,
                scopes: m,
                account: r.account ? r.account.getAccountInfo() : null,
                idToken: a ? a.rawToken : h.EMPTY_STRING,
                idTokenClaims: a ? a.claims : {},
                accessToken: f,
                fromCache: o,
                expiresOn: C,
                correlationId: i.correlationId,
                requestId: u || h.EMPTY_STRING,
                extExpiresOn: R,
                familyId: b,
                tokenType: ((l = r.accessToken) === null || l === void 0 ? void 0 : l.tokenType) || h.EMPTY_STRING,
                state: s ? s.userRequestState : h.EMPTY_STRING,
                cloudGraphHostName: ((d = r.account) === null || d === void 0 ? void 0 : d.cloudGraphHostName) || h.EMPTY_STRING,
                msGraphHost: ((p = r.account) === null || p === void 0 ? void 0 : p.msGraphHost) || h.EMPTY_STRING,
                code: c == null ? void 0 : c.spa_code,
                fromNativeBroker: !1
              }];
          }
        });
      });
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var Fr = (
  /** @class */
  function(n) {
    ue(e, n);
    function e(t, r) {
      var o = n.call(this, t, r) || this;
      return o.includeRedirectUri = !0, o;
    }
    return e.prototype.getAuthCodeUrl = function(t) {
      var r, o;
      return O(this, void 0, void 0, function() {
        var i;
        return U(this, function(a) {
          switch (a.label) {
            case 0:
              return (r = this.performanceClient) === null || r === void 0 || r.addQueueMeasurement(g.GetAuthCodeUrl, t.correlationId), (o = this.performanceClient) === null || o === void 0 || o.setPreQueueTime(g.AuthClientCreateQueryString, t.correlationId), [4, this.createAuthCodeUrlQueryString(t)];
            case 1:
              return i = a.sent(), [2, F.appendQueryString(this.authority.authorizationEndpoint, i)];
          }
        });
      });
    }, e.prototype.acquireToken = function(t, r) {
      var o, i, a, s, c, u;
      return O(this, void 0, void 0, function() {
        var l, d, p, f, m, C, R = this;
        return U(this, function(b) {
          switch (b.label) {
            case 0:
              if (!t || !t.code)
                throw w.createTokenRequestCannotBeMadeError();
              return (o = this.performanceClient) === null || o === void 0 || o.addQueueMeasurement(g.AuthClientAcquireToken, t.correlationId), l = (i = this.performanceClient) === null || i === void 0 ? void 0 : i.startMeasurement("AuthCodeClientAcquireToken", t.correlationId), this.logger.info("in acquireToken call in auth-code client"), d = fe.nowSeconds(), (a = this.performanceClient) === null || a === void 0 || a.setPreQueueTime(g.AuthClientExecuteTokenRequest, t.correlationId), [4, this.executeTokenRequest(this.authority, t)];
            case 1:
              return p = b.sent(), f = (s = p.headers) === null || s === void 0 ? void 0 : s[he.X_MS_REQUEST_ID], m = (c = p.headers) === null || c === void 0 ? void 0 : c[he.X_MS_HTTP_VERSION], m && (l == null || l.addStaticFields({
                httpVerAuthority: m
              })), C = new kt(this.config.authOptions.clientId, this.cacheManager, this.cryptoUtils, this.logger, this.config.serializableCache, this.config.persistencePlugin, this.performanceClient), C.validateTokenResponse(p.body), (u = this.performanceClient) === null || u === void 0 || u.setPreQueueTime(g.HandleServerTokenResponse, t.correlationId), [2, C.handleServerTokenResponse(p.body, this.authority, d, t, r, void 0, void 0, void 0, f).then(function(N) {
                return l == null || l.endMeasurement({
                  success: !0
                }), N;
              }).catch(function(N) {
                throw R.logger.verbose("Error in fetching token in ACC", t.correlationId), l == null || l.endMeasurement({
                  errorCode: N.errorCode,
                  subErrorCode: N.subError,
                  success: !1
                }), N;
              })];
          }
        });
      });
    }, e.prototype.handleFragmentResponse = function(t, r) {
      var o = new kt(this.config.authOptions.clientId, this.cacheManager, this.cryptoUtils, this.logger, null, null), i = new F(t), a = F.getDeserializedHash(i.getHash());
      if (o.validateServerAuthorizationCodeResponse(a, r, this.cryptoUtils), !a.code)
        throw w.createNoAuthCodeInServerResponseError();
      return B(B({}, a), {
        // Code param is optional in ServerAuthorizationCodeResponse but required in AuthorizationCodePaylod
        code: a.code
      });
    }, e.prototype.getLogoutUri = function(t) {
      if (!t)
        throw G.createEmptyLogoutRequestError();
      var r = this.createLogoutUrlQueryString(t);
      return F.appendQueryString(this.authority.endSessionEndpoint, r);
    }, e.prototype.executeTokenRequest = function(t, r) {
      var o, i;
      return O(this, void 0, void 0, function() {
        var a, s, c, u, l, d, p;
        return U(this, function(f) {
          switch (f.label) {
            case 0:
              return (o = this.performanceClient) === null || o === void 0 || o.addQueueMeasurement(g.AuthClientExecuteTokenRequest, r.correlationId), (i = this.performanceClient) === null || i === void 0 || i.setPreQueueTime(g.AuthClientCreateTokenRequestBody, r.correlationId), a = this.createTokenQueryParameters(r), s = F.appendQueryString(t.tokenEndpoint, a), [4, this.createTokenRequestBody(r)];
            case 1:
              if (c = f.sent(), u = void 0, r.clientInfo)
                try {
                  l = wt(r.clientInfo, this.cryptoUtils), u = {
                    credential: "" + l.uid + V.CLIENT_INFO_SEPARATOR + l.utid,
                    type: de.HOME_ACCOUNT_ID
                  };
                } catch (m) {
                  this.logger.verbose("Could not parse client info for CCS Header: " + m);
                }
              return d = this.createTokenRequestHeaders(u || r.ccsCredential), p = {
                clientId: this.config.authOptions.clientId,
                authority: t.canonicalAuthority,
                scopes: r.scopes,
                claims: r.claims,
                authenticationScheme: r.authenticationScheme,
                resourceRequestMethod: r.resourceRequestMethod,
                resourceRequestUri: r.resourceRequestUri,
                shrClaims: r.shrClaims,
                sshKid: r.sshKid
              }, [2, this.executePostToTokenEndpoint(s, c, d, p)];
          }
        });
      });
    }, e.prototype.createTokenRequestBody = function(t) {
      var r, o;
      return O(this, void 0, void 0, function() {
        var i, a, s, c, u, l, d, d, p;
        return U(this, function(f) {
          switch (f.label) {
            case 0:
              return (r = this.performanceClient) === null || r === void 0 || r.addQueueMeasurement(g.AuthClientCreateTokenRequestBody, t.correlationId), i = new st(), i.addClientId(this.config.authOptions.clientId), this.includeRedirectUri ? i.addRedirectUri(t.redirectUri) : He.validateRedirectUri(t.redirectUri), i.addScopes(t.scopes), i.addAuthorizationCode(t.code), i.addLibraryInfo(this.config.libraryInfo), i.addApplicationTelemetry(this.config.telemetry.application), i.addThrottling(), this.serverTelemetryManager && i.addServerTelemetry(this.serverTelemetryManager), t.codeVerifier && i.addCodeVerifier(t.codeVerifier), this.config.clientCredentials.clientSecret && i.addClientSecret(this.config.clientCredentials.clientSecret), this.config.clientCredentials.clientAssertion && (a = this.config.clientCredentials.clientAssertion, i.addClientAssertion(a.assertion), i.addClientAssertionType(a.assertionType)), i.addGrantType(_t.AUTHORIZATION_CODE_GRANT), i.addClientInfo(), t.authenticationScheme !== K.POP ? [3, 2] : (s = new Xe(this.cryptoUtils, this.performanceClient), (o = this.performanceClient) === null || o === void 0 || o.setPreQueueTime(g.PopTokenGenerateCnf, t.correlationId), [4, s.generateCnf(t)]);
            case 1:
              return c = f.sent(), i.addPopToken(c.reqCnfString), [3, 3];
            case 2:
              if (t.authenticationScheme === K.SSH)
                if (t.sshJwk)
                  i.addSshJwk(t.sshJwk);
                else
                  throw G.createMissingSshJwkError();
              f.label = 3;
            case 3:
              if (u = t.correlationId || this.config.cryptoInterface.createNewGuid(), i.addCorrelationId(u), (!I.isEmptyObj(t.claims) || this.config.authOptions.clientCapabilities && this.config.authOptions.clientCapabilities.length > 0) && i.addClaims(t.claims, this.config.authOptions.clientCapabilities), l = void 0, t.clientInfo)
                try {
                  d = wt(t.clientInfo, this.cryptoUtils), l = {
                    credential: "" + d.uid + V.CLIENT_INFO_SEPARATOR + d.utid,
                    type: de.HOME_ACCOUNT_ID
                  };
                } catch (m) {
                  this.logger.verbose("Could not parse client info for CCS Header: " + m);
                }
              else
                l = t.ccsCredential;
              if (this.config.systemOptions.preventCorsPreflight && l)
                switch (l.type) {
                  case de.HOME_ACCOUNT_ID:
                    try {
                      d = Qe(l.credential), i.addCcsOid(d);
                    } catch (m) {
                      this.logger.verbose("Could not parse home account ID for CCS Header: " + m);
                    }
                    break;
                  case de.UPN:
                    i.addCcsUpn(l.credential);
                    break;
                }
              return t.tokenBodyParameters && i.addExtraQueryParameters(t.tokenBodyParameters), t.enableSpaAuthorizationCode && (!t.tokenBodyParameters || !t.tokenBodyParameters[L.RETURN_SPA_CODE]) && i.addExtraQueryParameters((p = {}, p[L.RETURN_SPA_CODE] = "1", p)), [2, i.createQueryString()];
          }
        });
      });
    }, e.prototype.createAuthCodeUrlQueryString = function(t) {
      var r;
      return O(this, void 0, void 0, function() {
        var o, i, a, s, c, u, u, u, l, d;
        return U(this, function(p) {
          switch (p.label) {
            case 0:
              if ((r = this.performanceClient) === null || r === void 0 || r.addQueueMeasurement(g.AuthClientCreateQueryString, t.correlationId), o = new st(), o.addClientId(this.config.authOptions.clientId), i = Ot(t.scopes || [], t.extraScopesToConsent || []), o.addScopes(i), o.addRedirectUri(t.redirectUri), a = t.correlationId || this.config.cryptoInterface.createNewGuid(), o.addCorrelationId(a), o.addResponseMode(t.responseMode), o.addResponseTypeCode(), o.addLibraryInfo(this.config.libraryInfo), o.addApplicationTelemetry(this.config.telemetry.application), o.addClientInfo(), t.codeChallenge && t.codeChallengeMethod && o.addCodeChallengeParams(t.codeChallenge, t.codeChallengeMethod), t.prompt && o.addPrompt(t.prompt), t.domainHint && o.addDomainHint(t.domainHint), t.prompt !== ee.SELECT_ACCOUNT)
                if (t.sid && t.prompt === ee.NONE)
                  this.logger.verbose("createAuthCodeUrlQueryString: Prompt is none, adding sid from request"), o.addSid(t.sid);
                else if (t.account) {
                  if (s = this.extractAccountSid(t.account), c = this.extractLoginHint(t.account), c) {
                    this.logger.verbose("createAuthCodeUrlQueryString: login_hint claim present on account"), o.addLoginHint(c);
                    try {
                      u = Qe(t.account.homeAccountId), o.addCcsOid(u);
                    } catch {
                      this.logger.verbose("createAuthCodeUrlQueryString: Could not parse home account ID for CCS Header");
                    }
                  } else if (s && t.prompt === ee.NONE) {
                    this.logger.verbose("createAuthCodeUrlQueryString: Prompt is none, adding sid from account"), o.addSid(s);
                    try {
                      u = Qe(t.account.homeAccountId), o.addCcsOid(u);
                    } catch {
                      this.logger.verbose("createAuthCodeUrlQueryString: Could not parse home account ID for CCS Header");
                    }
                  } else if (t.loginHint)
                    this.logger.verbose("createAuthCodeUrlQueryString: Adding login_hint from request"), o.addLoginHint(t.loginHint), o.addCcsUpn(t.loginHint);
                  else if (t.account.username) {
                    this.logger.verbose("createAuthCodeUrlQueryString: Adding login_hint from account"), o.addLoginHint(t.account.username);
                    try {
                      u = Qe(t.account.homeAccountId), o.addCcsOid(u);
                    } catch {
                      this.logger.verbose("createAuthCodeUrlQueryString: Could not parse home account ID for CCS Header");
                    }
                  }
                } else
                  t.loginHint && (this.logger.verbose("createAuthCodeUrlQueryString: No account, adding login_hint from request"), o.addLoginHint(t.loginHint), o.addCcsUpn(t.loginHint));
              else
                this.logger.verbose("createAuthCodeUrlQueryString: Prompt is select_account, ignoring account hints");
              return t.nonce && o.addNonce(t.nonce), t.state && o.addState(t.state), (!I.isEmpty(t.claims) || this.config.authOptions.clientCapabilities && this.config.authOptions.clientCapabilities.length > 0) && o.addClaims(t.claims, this.config.authOptions.clientCapabilities), t.extraQueryParameters && o.addExtraQueryParameters(t.extraQueryParameters), t.nativeBroker ? (o.addNativeBroker(), t.authenticationScheme !== K.POP ? [3, 2] : (l = new Xe(this.cryptoUtils), [4, l.generateCnf(t)])) : [3, 2];
            case 1:
              d = p.sent(), o.addPopToken(d.reqCnfHash), p.label = 2;
            case 2:
              return [2, o.createQueryString()];
          }
        });
      });
    }, e.prototype.createLogoutUrlQueryString = function(t) {
      var r = new st();
      return t.postLogoutRedirectUri && r.addPostLogoutRedirectUri(t.postLogoutRedirectUri), t.correlationId && r.addCorrelationId(t.correlationId), t.idTokenHint && r.addIdTokenHint(t.idTokenHint), t.state && r.addState(t.state), t.logoutHint && r.addLogoutHint(t.logoutHint), t.extraQueryParameters && r.addExtraQueryParameters(t.extraQueryParameters), r.createQueryString();
    }, e.prototype.extractAccountSid = function(t) {
      var r;
      return ((r = t.idTokenClaims) === null || r === void 0 ? void 0 : r.sid) || null;
    }, e.prototype.extractLoginHint = function(t) {
      var r;
      return ((r = t.idTokenClaims) === null || r === void 0 ? void 0 : r.login_hint) || null;
    }, e;
  }(Zt)
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var xr = (
  /** @class */
  function(n) {
    ue(e, n);
    function e(t, r) {
      return n.call(this, t, r) || this;
    }
    return e.prototype.acquireToken = function(t) {
      var r, o, i, a, s, c, u;
      return O(this, void 0, void 0, function() {
        var l, d, p, f, m, C, R = this;
        return U(this, function(b) {
          switch (b.label) {
            case 0:
              return (r = this.performanceClient) === null || r === void 0 || r.addQueueMeasurement(g.RefreshTokenClientAcquireToken, t.correlationId), l = (o = this.performanceClient) === null || o === void 0 ? void 0 : o.startMeasurement(g.RefreshTokenClientAcquireToken, t.correlationId), this.logger.verbose("RefreshTokenClientAcquireToken called", t.correlationId), d = fe.nowSeconds(), (i = this.performanceClient) === null || i === void 0 || i.setPreQueueTime(g.RefreshTokenClientExecuteTokenRequest, t.correlationId), [4, this.executeTokenRequest(t, this.authority)];
            case 1:
              return p = b.sent(), f = (a = p.headers) === null || a === void 0 ? void 0 : a[he.X_MS_HTTP_VERSION], l == null || l.addStaticFields({
                refreshTokenSize: ((s = p.body.refresh_token) === null || s === void 0 ? void 0 : s.length) || 0
              }), f && (l == null || l.addStaticFields({
                httpVerToken: f
              })), m = (c = p.headers) === null || c === void 0 ? void 0 : c[he.X_MS_REQUEST_ID], C = new kt(this.config.authOptions.clientId, this.cacheManager, this.cryptoUtils, this.logger, this.config.serializableCache, this.config.persistencePlugin), C.validateTokenResponse(p.body), (u = this.performanceClient) === null || u === void 0 || u.setPreQueueTime(g.HandleServerTokenResponse, t.correlationId), [2, C.handleServerTokenResponse(p.body, this.authority, d, t, void 0, void 0, !0, t.forceCache, m).then(function(N) {
                return l == null || l.endMeasurement({
                  success: !0
                }), N;
              }).catch(function(N) {
                throw R.logger.verbose("Error in fetching refresh token", t.correlationId), l == null || l.endMeasurement({
                  errorCode: N.errorCode,
                  subErrorCode: N.subError,
                  success: !1
                }), N;
              })];
          }
        });
      });
    }, e.prototype.acquireTokenByRefreshToken = function(t) {
      var r, o, i, a;
      return O(this, void 0, void 0, function() {
        var s, c, u;
        return U(this, function(l) {
          if (!t)
            throw G.createEmptyTokenRequestError();
          if ((r = this.performanceClient) === null || r === void 0 || r.addQueueMeasurement(g.RefreshTokenClientAcquireTokenByRefreshToken, t.correlationId), !t.account)
            throw w.createNoAccountInSilentRequestError();
          if (s = this.cacheManager.isAppMetadataFOCI(t.account.environment), s)
            try {
              return (o = this.performanceClient) === null || o === void 0 || o.setPreQueueTime(g.RefreshTokenClientAcquireTokenWithCachedRefreshToken, t.correlationId), [2, this.acquireTokenWithCachedRefreshToken(t, !0)];
            } catch (d) {
              if (c = d instanceof ye && d.errorCode === tt.noTokensFoundError.code, u = d instanceof Be && d.errorCode === ur.INVALID_GRANT_ERROR && d.subError === ur.CLIENT_MISMATCH_ERROR, c || u)
                return (i = this.performanceClient) === null || i === void 0 || i.setPreQueueTime(g.RefreshTokenClientAcquireTokenWithCachedRefreshToken, t.correlationId), [2, this.acquireTokenWithCachedRefreshToken(t, !1)];
              throw d;
            }
          return (a = this.performanceClient) === null || a === void 0 || a.setPreQueueTime(g.RefreshTokenClientAcquireTokenWithCachedRefreshToken, t.correlationId), [2, this.acquireTokenWithCachedRefreshToken(t, !1)];
        });
      });
    }, e.prototype.acquireTokenWithCachedRefreshToken = function(t, r) {
      var o, i, a;
      return O(this, void 0, void 0, function() {
        var s, c, u;
        return U(this, function(l) {
          if ((o = this.performanceClient) === null || o === void 0 || o.addQueueMeasurement(g.RefreshTokenClientAcquireTokenWithCachedRefreshToken, t.correlationId), s = (i = this.performanceClient) === null || i === void 0 ? void 0 : i.startMeasurement(g.RefreshTokenClientAcquireTokenWithCachedRefreshToken, t.correlationId), this.logger.verbose("RefreshTokenClientAcquireTokenWithCachedRefreshToken called", t.correlationId), c = this.cacheManager.getRefreshToken(t.account, r), !c)
            throw s == null || s.discardMeasurement(), ye.createNoTokensFoundError();
          return s == null || s.endMeasurement({
            success: !0
          }), u = B(B({}, t), { refreshToken: c.secret, authenticationScheme: t.authenticationScheme || K.BEARER, ccsCredential: {
            credential: t.account.homeAccountId,
            type: de.HOME_ACCOUNT_ID
          } }), (a = this.performanceClient) === null || a === void 0 || a.setPreQueueTime(g.RefreshTokenClientAcquireToken, t.correlationId), [2, this.acquireToken(u)];
        });
      });
    }, e.prototype.executeTokenRequest = function(t, r) {
      var o, i, a;
      return O(this, void 0, void 0, function() {
        var s, c, u, l, d, p;
        return U(this, function(f) {
          switch (f.label) {
            case 0:
              return (o = this.performanceClient) === null || o === void 0 || o.addQueueMeasurement(g.RefreshTokenClientExecuteTokenRequest, t.correlationId), s = (i = this.performanceClient) === null || i === void 0 ? void 0 : i.startMeasurement(g.RefreshTokenClientExecuteTokenRequest, t.correlationId), (a = this.performanceClient) === null || a === void 0 || a.setPreQueueTime(g.RefreshTokenClientCreateTokenRequestBody, t.correlationId), c = this.createTokenQueryParameters(t), u = F.appendQueryString(r.tokenEndpoint, c), [4, this.createTokenRequestBody(t)];
            case 1:
              return l = f.sent(), d = this.createTokenRequestHeaders(t.ccsCredential), p = {
                clientId: this.config.authOptions.clientId,
                authority: r.canonicalAuthority,
                scopes: t.scopes,
                claims: t.claims,
                authenticationScheme: t.authenticationScheme,
                resourceRequestMethod: t.resourceRequestMethod,
                resourceRequestUri: t.resourceRequestUri,
                shrClaims: t.shrClaims,
                sshKid: t.sshKid
              }, [2, this.executePostToTokenEndpoint(u, l, d, p).then(function(m) {
                return s == null || s.endMeasurement({
                  success: !0
                }), m;
              }).catch(function(m) {
                throw s == null || s.endMeasurement({
                  success: !1
                }), m;
              })];
          }
        });
      });
    }, e.prototype.createTokenRequestBody = function(t) {
      var r, o, i;
      return O(this, void 0, void 0, function() {
        var a, s, c, u, l, d, p;
        return U(this, function(f) {
          switch (f.label) {
            case 0:
              return (r = this.performanceClient) === null || r === void 0 || r.addQueueMeasurement(g.RefreshTokenClientCreateTokenRequestBody, t.correlationId), a = t.correlationId, s = (o = this.performanceClient) === null || o === void 0 ? void 0 : o.startMeasurement(g.BaseClientCreateTokenRequestHeaders, a), c = new st(), c.addClientId(this.config.authOptions.clientId), c.addScopes(t.scopes), c.addGrantType(_t.REFRESH_TOKEN_GRANT), c.addClientInfo(), c.addLibraryInfo(this.config.libraryInfo), c.addApplicationTelemetry(this.config.telemetry.application), c.addThrottling(), this.serverTelemetryManager && c.addServerTelemetry(this.serverTelemetryManager), c.addCorrelationId(a), c.addRefreshToken(t.refreshToken), this.config.clientCredentials.clientSecret && c.addClientSecret(this.config.clientCredentials.clientSecret), this.config.clientCredentials.clientAssertion && (u = this.config.clientCredentials.clientAssertion, c.addClientAssertion(u.assertion), c.addClientAssertionType(u.assertionType)), t.authenticationScheme !== K.POP ? [3, 2] : (l = new Xe(this.cryptoUtils, this.performanceClient), (i = this.performanceClient) === null || i === void 0 || i.setPreQueueTime(g.PopTokenGenerateCnf, t.correlationId), [4, l.generateCnf(t)]);
            case 1:
              return d = f.sent(), c.addPopToken(d.reqCnfString), [3, 3];
            case 2:
              if (t.authenticationScheme === K.SSH)
                if (t.sshJwk)
                  c.addSshJwk(t.sshJwk);
                else
                  throw s == null || s.endMeasurement({
                    success: !1
                  }), G.createMissingSshJwkError();
              f.label = 3;
            case 3:
              if ((!I.isEmptyObj(t.claims) || this.config.authOptions.clientCapabilities && this.config.authOptions.clientCapabilities.length > 0) && c.addClaims(t.claims, this.config.authOptions.clientCapabilities), this.config.systemOptions.preventCorsPreflight && t.ccsCredential)
                switch (t.ccsCredential.type) {
                  case de.HOME_ACCOUNT_ID:
                    try {
                      p = Qe(t.ccsCredential.credential), c.addCcsOid(p);
                    } catch (m) {
                      this.logger.verbose("Could not parse home account ID for CCS Header: " + m);
                    }
                    break;
                  case de.UPN:
                    c.addCcsUpn(t.ccsCredential.credential);
                    break;
                }
              return s == null || s.endMeasurement({
                success: !0
              }), [2, c.createQueryString()];
          }
        });
      });
    }, e;
  }(Zt)
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var vn = (
  /** @class */
  function(n) {
    ue(e, n);
    function e(t, r) {
      return n.call(this, t, r) || this;
    }
    return e.prototype.acquireToken = function(t) {
      return O(this, void 0, void 0, function() {
        var r, o;
        return U(this, function(i) {
          switch (i.label) {
            case 0:
              return i.trys.push([0, 2, , 3]), [4, this.acquireCachedToken(t)];
            case 1:
              return [2, i.sent()];
            case 2:
              if (r = i.sent(), r instanceof w && r.errorCode === _.tokenRefreshRequired.code)
                return o = new xr(this.config, this.performanceClient), [2, o.acquireTokenByRefreshToken(t)];
              throw r;
            case 3:
              return [
                2
                /*return*/
              ];
          }
        });
      });
    }, e.prototype.acquireCachedToken = function(t) {
      var r, o, i, a;
      return O(this, void 0, void 0, function() {
        var s, c;
        return U(this, function(u) {
          switch (u.label) {
            case 0:
              if (!t)
                throw G.createEmptyTokenRequestError();
              if (t.forceRefresh)
                throw (r = this.serverTelemetryManager) === null || r === void 0 || r.setCacheOutcome(De.FORCE_REFRESH), this.logger.info("SilentFlowClient:acquireCachedToken - Skipping cache because forceRefresh is true."), w.createRefreshRequiredError();
              if (!t.account)
                throw w.createNoAccountInSilentRequestError();
              if (s = t.authority || this.authority.getPreferredCache(), c = this.cacheManager.readCacheRecord(t.account, t, s), c.accessToken) {
                if (fe.wasClockTurnedBack(c.accessToken.cachedAt) || fe.isTokenExpired(c.accessToken.expiresOn, this.config.systemOptions.tokenRenewalOffsetSeconds))
                  throw (i = this.serverTelemetryManager) === null || i === void 0 || i.setCacheOutcome(De.CACHED_ACCESS_TOKEN_EXPIRED), this.logger.info("SilentFlowClient:acquireCachedToken - Cached access token is expired or will expire within " + this.config.systemOptions.tokenRenewalOffsetSeconds + " seconds."), w.createRefreshRequiredError();
                if (c.accessToken.refreshOn && fe.isTokenExpired(c.accessToken.refreshOn, 0))
                  throw (a = this.serverTelemetryManager) === null || a === void 0 || a.setCacheOutcome(De.REFRESH_CACHED_ACCESS_TOKEN), this.logger.info("SilentFlowClient:acquireCachedToken - Cached access token's refreshOn property has been exceeded'."), w.createRefreshRequiredError();
              } else
                throw (o = this.serverTelemetryManager) === null || o === void 0 || o.setCacheOutcome(De.NO_CACHED_ACCESS_TOKEN), this.logger.info("SilentFlowClient:acquireCachedToken - No access token found in cache for the given properties."), w.createRefreshRequiredError();
              return this.config.serverTelemetryManager && this.config.serverTelemetryManager.incrementCacheHits(), [4, this.generateResultFromCacheRecord(c, t)];
            case 1:
              return [2, u.sent()];
          }
        });
      });
    }, e.prototype.generateResultFromCacheRecord = function(t, r) {
      return O(this, void 0, void 0, function() {
        var o, i;
        return U(this, function(a) {
          switch (a.label) {
            case 0:
              if (t.idToken && (o = new we(t.idToken.secret, this.config.cryptoInterface)), r.maxAge || r.maxAge === 0) {
                if (i = o == null ? void 0 : o.claims.auth_time, !i)
                  throw w.createAuthTimeNotFoundError();
                we.checkMaxAge(i, r.maxAge);
              }
              return [4, kt.generateAuthenticationResult(this.cryptoUtils, this.authority, t, !0, r, o)];
            case 1:
              return [2, a.sent()];
          }
        });
      });
    }, e;
  }(Zt)
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
function yn(n) {
  return n.hasOwnProperty("authorization_endpoint") && n.hasOwnProperty("token_endpoint") && n.hasOwnProperty("issuer") && n.hasOwnProperty("jwks_uri");
}
/*! @azure/msal-common v13.0.0 2023-05-01 */
var Kr = { endpointMetadata: { "https://login.microsoftonline.com/common/": { token_endpoint: "https://login.microsoftonline.com/common/oauth2/v2.0/token", token_endpoint_auth_methods_supported: ["client_secret_post", "private_key_jwt", "client_secret_basic"], jwks_uri: "https://login.microsoftonline.com/common/discovery/v2.0/keys", response_modes_supported: ["query", "fragment", "form_post"], subject_types_supported: ["pairwise"], id_token_signing_alg_values_supported: ["RS256"], response_types_supported: ["code", "id_token", "code id_token", "id_token token"], scopes_supported: ["openid", "profile", "email", "offline_access"], issuer: "https://login.microsoftonline.com/{tenantid}/v2.0", request_uri_parameter_supported: !1, userinfo_endpoint: "https://graph.microsoft.com/oidc/userinfo", authorization_endpoint: "https://login.microsoftonline.com/common/oauth2/v2.0/authorize", device_authorization_endpoint: "https://login.microsoftonline.com/common/oauth2/v2.0/devicecode", http_logout_supported: !0, frontchannel_logout_supported: !0, end_session_endpoint: "https://login.microsoftonline.com/common/oauth2/v2.0/logout", claims_supported: ["sub", "iss", "cloud_instance_name", "cloud_instance_host_name", "cloud_graph_host_name", "msgraph_host", "aud", "exp", "iat", "auth_time", "acr", "nonce", "preferred_username", "name", "tid", "ver", "at_hash", "c_hash", "email"], kerberos_endpoint: "https://login.microsoftonline.com/common/kerberos", tenant_region_scope: null, cloud_instance_name: "microsoftonline.com", cloud_graph_host_name: "graph.windows.net", msgraph_host: "graph.microsoft.com", rbac_url: "https://pas.windows.net" }, "https://login.chinacloudapi.cn/common/": { token_endpoint: "https://login.chinacloudapi.cn/common/oauth2/v2.0/token", token_endpoint_auth_methods_supported: ["client_secret_post", "private_key_jwt", "client_secret_basic"], jwks_uri: "https://login.chinacloudapi.cn/common/discovery/v2.0/keys", response_modes_supported: ["query", "fragment", "form_post"], subject_types_supported: ["pairwise"], id_token_signing_alg_values_supported: ["RS256"], response_types_supported: ["code", "id_token", "code id_token", "id_token token"], scopes_supported: ["openid", "profile", "email", "offline_access"], issuer: "https://login.partner.microsoftonline.cn/{tenantid}/v2.0", request_uri_parameter_supported: !1, userinfo_endpoint: "https://microsoftgraph.chinacloudapi.cn/oidc/userinfo", authorization_endpoint: "https://login.chinacloudapi.cn/common/oauth2/v2.0/authorize", device_authorization_endpoint: "https://login.chinacloudapi.cn/common/oauth2/v2.0/devicecode", http_logout_supported: !0, frontchannel_logout_supported: !0, end_session_endpoint: "https://login.chinacloudapi.cn/common/oauth2/v2.0/logout", claims_supported: ["sub", "iss", "cloud_instance_name", "cloud_instance_host_name", "cloud_graph_host_name", "msgraph_host", "aud", "exp", "iat", "auth_time", "acr", "nonce", "preferred_username", "name", "tid", "ver", "at_hash", "c_hash", "email"], kerberos_endpoint: "https://login.chinacloudapi.cn/common/kerberos", tenant_region_scope: null, cloud_instance_name: "partner.microsoftonline.cn", cloud_graph_host_name: "graph.chinacloudapi.cn", msgraph_host: "microsoftgraph.chinacloudapi.cn", rbac_url: "https://pas.chinacloudapi.cn" }, "https://login.microsoftonline.us/common/": { token_endpoint: "https://login.microsoftonline.us/common/oauth2/v2.0/token", token_endpoint_auth_methods_supported: ["client_secret_post", "private_key_jwt", "client_secret_basic"], jwks_uri: "https://login.microsoftonline.us/common/discovery/v2.0/keys", response_modes_supported: ["query", "fragment", "form_post"], subject_types_supported: ["pairwise"], id_token_signing_alg_values_supported: ["RS256"], response_types_supported: ["code", "id_token", "code id_token", "id_token token"], scopes_supported: ["openid", "profile", "email", "offline_access"], issuer: "https://login.microsoftonline.us/{tenantid}/v2.0", request_uri_parameter_supported: !1, userinfo_endpoint: "https://graph.microsoft.com/oidc/userinfo", authorization_endpoint: "https://login.microsoftonline.us/common/oauth2/v2.0/authorize", device_authorization_endpoint: "https://login.microsoftonline.us/common/oauth2/v2.0/devicecode", http_logout_supported: !0, frontchannel_logout_supported: !0, end_session_endpoint: "https://login.microsoftonline.us/common/oauth2/v2.0/logout", claims_supported: ["sub", "iss", "cloud_instance_name", "cloud_instance_host_name", "cloud_graph_host_name", "msgraph_host", "aud", "exp", "iat", "auth_time", "acr", "nonce", "preferred_username", "name", "tid", "ver", "at_hash", "c_hash", "email"], kerberos_endpoint: "https://login.microsoftonline.us/common/kerberos", tenant_region_scope: null, cloud_instance_name: "microsoftonline.us", cloud_graph_host_name: "graph.windows.net", msgraph_host: "graph.microsoft.com", rbac_url: "https://pasff.usgovcloudapi.net" }, "https://login.microsoftonline.com/consumers/": { token_endpoint: "https://login.microsoftonline.com/consumers/oauth2/v2.0/token", token_endpoint_auth_methods_supported: ["client_secret_post", "private_key_jwt", "client_secret_basic"], jwks_uri: "https://login.microsoftonline.com/consumers/discovery/v2.0/keys", response_modes_supported: ["query", "fragment", "form_post"], subject_types_supported: ["pairwise"], id_token_signing_alg_values_supported: ["RS256"], response_types_supported: ["code", "id_token", "code id_token", "id_token token"], scopes_supported: ["openid", "profile", "email", "offline_access"], issuer: "https://login.microsoftonline.com/9188040d-6c67-4c5b-b112-36a304b66dad/v2.0", request_uri_parameter_supported: !1, userinfo_endpoint: "https://graph.microsoft.com/oidc/userinfo", authorization_endpoint: "https://login.microsoftonline.com/consumers/oauth2/v2.0/authorize", device_authorization_endpoint: "https://login.microsoftonline.com/consumers/oauth2/v2.0/devicecode", http_logout_supported: !0, frontchannel_logout_supported: !0, end_session_endpoint: "https://login.microsoftonline.com/consumers/oauth2/v2.0/logout", claims_supported: ["sub", "iss", "cloud_instance_name", "cloud_instance_host_name", "cloud_graph_host_name", "msgraph_host", "aud", "exp", "iat", "auth_time", "acr", "nonce", "preferred_username", "name", "tid", "ver", "at_hash", "c_hash", "email"], kerberos_endpoint: "https://login.microsoftonline.com/consumers/kerberos", tenant_region_scope: null, cloud_instance_name: "microsoftonline.com", cloud_graph_host_name: "graph.windows.net", msgraph_host: "graph.microsoft.com", rbac_url: "https://pas.windows.net" }, "https://login.chinacloudapi.cn/consumers/": { token_endpoint: "https://login.chinacloudapi.cn/consumers/oauth2/v2.0/token", token_endpoint_auth_methods_supported: ["client_secret_post", "private_key_jwt", "client_secret_basic"], jwks_uri: "https://login.chinacloudapi.cn/consumers/discovery/v2.0/keys", response_modes_supported: ["query", "fragment", "form_post"], subject_types_supported: ["pairwise"], id_token_signing_alg_values_supported: ["RS256"], response_types_supported: ["code", "id_token", "code id_token", "id_token token"], scopes_supported: ["openid", "profile", "email", "offline_access"], issuer: "https://login.partner.microsoftonline.cn/9188040d-6c67-4c5b-b112-36a304b66dad/v2.0", request_uri_parameter_supported: !1, userinfo_endpoint: "https://microsoftgraph.chinacloudapi.cn/oidc/userinfo", authorization_endpoint: "https://login.chinacloudapi.cn/consumers/oauth2/v2.0/authorize", device_authorization_endpoint: "https://login.chinacloudapi.cn/consumers/oauth2/v2.0/devicecode", http_logout_supported: !0, frontchannel_logout_supported: !0, end_session_endpoint: "https://login.chinacloudapi.cn/consumers/oauth2/v2.0/logout", claims_supported: ["sub", "iss", "cloud_instance_name", "cloud_instance_host_name", "cloud_graph_host_name", "msgraph_host", "aud", "exp", "iat", "auth_time", "acr", "nonce", "preferred_username", "name", "tid", "ver", "at_hash", "c_hash", "email"], kerberos_endpoint: "https://login.chinacloudapi.cn/consumers/kerberos", tenant_region_scope: null, cloud_instance_name: "partner.microsoftonline.cn", cloud_graph_host_name: "graph.chinacloudapi.cn", msgraph_host: "microsoftgraph.chinacloudapi.cn", rbac_url: "https://pas.chinacloudapi.cn" }, "https://login.microsoftonline.us/consumers/": { token_endpoint: "https://login.microsoftonline.us/consumers/oauth2/v2.0/token", token_endpoint_auth_methods_supported: ["client_secret_post", "private_key_jwt", "client_secret_basic"], jwks_uri: "https://login.microsoftonline.us/consumers/discovery/v2.0/keys", response_modes_supported: ["query", "fragment", "form_post"], subject_types_supported: ["pairwise"], id_token_signing_alg_values_supported: ["RS256"], response_types_supported: ["code", "id_token", "code id_token", "id_token token"], scopes_supported: ["openid", "profile", "email", "offline_access"], issuer: "https://login.microsoftonline.us/9188040d-6c67-4c5b-b112-36a304b66dad/v2.0", request_uri_parameter_supported: !1, userinfo_endpoint: "https://graph.microsoft.com/oidc/userinfo", authorization_endpoint: "https://login.microsoftonline.us/consumers/oauth2/v2.0/authorize", device_authorization_endpoint: "https://login.microsoftonline.us/consumers/oauth2/v2.0/devicecode", http_logout_supported: !0, frontchannel_logout_supported: !0, end_session_endpoint: "https://login.microsoftonline.us/consumers/oauth2/v2.0/logout", claims_supported: ["sub", "iss", "cloud_instance_name", "cloud_instance_host_name", "cloud_graph_host_name", "msgraph_host", "aud", "exp", "iat", "auth_time", "acr", "nonce", "preferred_username", "name", "tid", "ver", "at_hash", "c_hash", "email"], kerberos_endpoint: "https://login.microsoftonline.us/consumers/kerberos", tenant_region_scope: null, cloud_instance_name: "microsoftonline.us", cloud_graph_host_name: "graph.windows.net", msgraph_host: "graph.microsoft.com", rbac_url: "https://pasff.usgovcloudapi.net" }, "https://login.microsoftonline.com/organizations/": { token_endpoint: "https://login.microsoftonline.com/organizations/oauth2/v2.0/token", token_endpoint_auth_methods_supported: ["client_secret_post", "private_key_jwt", "client_secret_basic"], jwks_uri: "https://login.microsoftonline.com/organizations/discovery/v2.0/keys", response_modes_supported: ["query", "fragment", "form_post"], subject_types_supported: ["pairwise"], id_token_signing_alg_values_supported: ["RS256"], response_types_supported: ["code", "id_token", "code id_token", "id_token token"], scopes_supported: ["openid", "profile", "email", "offline_access"], issuer: "https://login.microsoftonline.com/{tenantid}/v2.0", request_uri_parameter_supported: !1, userinfo_endpoint: "https://graph.microsoft.com/oidc/userinfo", authorization_endpoint: "https://login.microsoftonline.com/organizations/oauth2/v2.0/authorize", device_authorization_endpoint: "https://login.microsoftonline.com/organizations/oauth2/v2.0/devicecode", http_logout_supported: !0, frontchannel_logout_supported: !0, end_session_endpoint: "https://login.microsoftonline.com/organizations/oauth2/v2.0/logout", claims_supported: ["sub", "iss", "cloud_instance_name", "cloud_instance_host_name", "cloud_graph_host_name", "msgraph_host", "aud", "exp", "iat", "auth_time", "acr", "nonce", "preferred_username", "name", "tid", "ver", "at_hash", "c_hash", "email"], kerberos_endpoint: "https://login.microsoftonline.com/organizations/kerberos", tenant_region_scope: null, cloud_instance_name: "microsoftonline.com", cloud_graph_host_name: "graph.windows.net", msgraph_host: "graph.microsoft.com", rbac_url: "https://pas.windows.net" }, "https://login.chinacloudapi.cn/organizations/": { token_endpoint: "https://login.chinacloudapi.cn/organizations/oauth2/v2.0/token", token_endpoint_auth_methods_supported: ["client_secret_post", "private_key_jwt", "client_secret_basic"], jwks_uri: "https://login.chinacloudapi.cn/organizations/discovery/v2.0/keys", response_modes_supported: ["query", "fragment", "form_post"], subject_types_supported: ["pairwise"], id_token_signing_alg_values_supported: ["RS256"], response_types_supported: ["code", "id_token", "code id_token", "id_token token"], scopes_supported: ["openid", "profile", "email", "offline_access"], issuer: "https://login.partner.microsoftonline.cn/{tenantid}/v2.0", request_uri_parameter_supported: !1, userinfo_endpoint: "https://microsoftgraph.chinacloudapi.cn/oidc/userinfo", authorization_endpoint: "https://login.chinacloudapi.cn/organizations/oauth2/v2.0/authorize", device_authorization_endpoint: "https://login.chinacloudapi.cn/organizations/oauth2/v2.0/devicecode", http_logout_supported: !0, frontchannel_logout_supported: !0, end_session_endpoint: "https://login.chinacloudapi.cn/organizations/oauth2/v2.0/logout", claims_supported: ["sub", "iss", "cloud_instance_name", "cloud_instance_host_name", "cloud_graph_host_name", "msgraph_host", "aud", "exp", "iat", "auth_time", "acr", "nonce", "preferred_username", "name", "tid", "ver", "at_hash", "c_hash", "email"], kerberos_endpoint: "https://login.chinacloudapi.cn/organizations/kerberos", tenant_region_scope: null, cloud_instance_name: "partner.microsoftonline.cn", cloud_graph_host_name: "graph.chinacloudapi.cn", msgraph_host: "microsoftgraph.chinacloudapi.cn", rbac_url: "https://pas.chinacloudapi.cn" }, "https://login.microsoftonline.us/organizations/": { token_endpoint: "https://login.microsoftonline.us/organizations/oauth2/v2.0/token", token_endpoint_auth_methods_supported: ["client_secret_post", "private_key_jwt", "client_secret_basic"], jwks_uri: "https://login.microsoftonline.us/organizations/discovery/v2.0/keys", response_modes_supported: ["query", "fragment", "form_post"], subject_types_supported: ["pairwise"], id_token_signing_alg_values_supported: ["RS256"], response_types_supported: ["code", "id_token", "code id_token", "id_token token"], scopes_supported: ["openid", "profile", "email", "offline_access"], issuer: "https://login.microsoftonline.us/{tenantid}/v2.0", request_uri_parameter_supported: !1, userinfo_endpoint: "https://graph.microsoft.com/oidc/userinfo", authorization_endpoint: "https://login.microsoftonline.us/organizations/oauth2/v2.0/authorize", device_authorization_endpoint: "https://login.microsoftonline.us/organizations/oauth2/v2.0/devicecode", http_logout_supported: !0, frontchannel_logout_supported: !0, end_session_endpoint: "https://login.microsoftonline.us/organizations/oauth2/v2.0/logout", claims_supported: ["sub", "iss", "cloud_instance_name", "cloud_instance_host_name", "cloud_graph_host_name", "msgraph_host", "aud", "exp", "iat", "auth_time", "acr", "nonce", "preferred_username", "name", "tid", "ver", "at_hash", "c_hash", "email"], kerberos_endpoint: "https://login.microsoftonline.us/organizations/kerberos", tenant_region_scope: null, cloud_instance_name: "microsoftonline.us", cloud_graph_host_name: "graph.windows.net", msgraph_host: "graph.microsoft.com", rbac_url: "https://pasff.usgovcloudapi.net" } }, instanceDiscoveryMetadata: { "https://login.microsoftonline.com/common/": { tenant_discovery_endpoint: "https://login.microsoftonline.com/common/v2.0/.well-known/openid-configuration", "api-version": "1.1", metadata: [{ preferred_network: "login.microsoftonline.com", preferred_cache: "login.windows.net", aliases: ["login.microsoftonline.com", "login.windows.net", "login.microsoft.com", "sts.windows.net"] }, { preferred_network: "login.partner.microsoftonline.cn", preferred_cache: "login.partner.microsoftonline.cn", aliases: ["login.partner.microsoftonline.cn", "login.chinacloudapi.cn"] }, { preferred_network: "login.microsoftonline.de", preferred_cache: "login.microsoftonline.de", aliases: ["login.microsoftonline.de"] }, { preferred_network: "login.microsoftonline.us", preferred_cache: "login.microsoftonline.us", aliases: ["login.microsoftonline.us", "login.usgovcloudapi.net"] }, { preferred_network: "login-us.microsoftonline.com", preferred_cache: "login-us.microsoftonline.com", aliases: ["login-us.microsoftonline.com"] }] }, "https://login.chinacloudapi.cn/common/": { tenant_discovery_endpoint: "https://login.chinacloudapi.cn/common/v2.0/.well-known/openid-configuration", "api-version": "1.1", metadata: [{ preferred_network: "login.microsoftonline.com", preferred_cache: "login.windows.net", aliases: ["login.microsoftonline.com", "login.windows.net", "login.microsoft.com", "sts.windows.net"] }, { preferred_network: "login.partner.microsoftonline.cn", preferred_cache: "login.partner.microsoftonline.cn", aliases: ["login.partner.microsoftonline.cn", "login.chinacloudapi.cn"] }, { preferred_network: "login.microsoftonline.de", preferred_cache: "login.microsoftonline.de", aliases: ["login.microsoftonline.de"] }, { preferred_network: "login.microsoftonline.us", preferred_cache: "login.microsoftonline.us", aliases: ["login.microsoftonline.us", "login.usgovcloudapi.net"] }, { preferred_network: "login-us.microsoftonline.com", preferred_cache: "login-us.microsoftonline.com", aliases: ["login-us.microsoftonline.com"] }] }, "https://login.microsoftonline.us/common/": { tenant_discovery_endpoint: "https://login.microsoftonline.us/common/v2.0/.well-known/openid-configuration", "api-version": "1.1", metadata: [{ preferred_network: "login.microsoftonline.com", preferred_cache: "login.windows.net", aliases: ["login.microsoftonline.com", "login.windows.net", "login.microsoft.com", "sts.windows.net"] }, { preferred_network: "login.partner.microsoftonline.cn", preferred_cache: "login.partner.microsoftonline.cn", aliases: ["login.partner.microsoftonline.cn", "login.chinacloudapi.cn"] }, { preferred_network: "login.microsoftonline.de", preferred_cache: "login.microsoftonline.de", aliases: ["login.microsoftonline.de"] }, { preferred_network: "login.microsoftonline.us", preferred_cache: "login.microsoftonline.us", aliases: ["login.microsoftonline.us", "login.usgovcloudapi.net"] }, { preferred_network: "login-us.microsoftonline.com", preferred_cache: "login-us.microsoftonline.com", aliases: ["login-us.microsoftonline.com"] }] }, "https://login.microsoftonline.com/consumers/": { tenant_discovery_endpoint: "https://login.microsoftonline.com/consumers/v2.0/.well-known/openid-configuration", "api-version": "1.1", metadata: [{ preferred_network: "login.microsoftonline.com", preferred_cache: "login.windows.net", aliases: ["login.microsoftonline.com", "login.windows.net", "login.microsoft.com", "sts.windows.net"] }, { preferred_network: "login.partner.microsoftonline.cn", preferred_cache: "login.partner.microsoftonline.cn", aliases: ["login.partner.microsoftonline.cn", "login.chinacloudapi.cn"] }, { preferred_network: "login.microsoftonline.de", preferred_cache: "login.microsoftonline.de", aliases: ["login.microsoftonline.de"] }, { preferred_network: "login.microsoftonline.us", preferred_cache: "login.microsoftonline.us", aliases: ["login.microsoftonline.us", "login.usgovcloudapi.net"] }, { preferred_network: "login-us.microsoftonline.com", preferred_cache: "login-us.microsoftonline.com", aliases: ["login-us.microsoftonline.com"] }] }, "https://login.chinacloudapi.cn/consumers/": { tenant_discovery_endpoint: "https://login.chinacloudapi.cn/consumers/v2.0/.well-known/openid-configuration", "api-version": "1.1", metadata: [{ preferred_network: "login.microsoftonline.com", preferred_cache: "login.windows.net", aliases: ["login.microsoftonline.com", "login.windows.net", "login.microsoft.com", "sts.windows.net"] }, { preferred_network: "login.partner.microsoftonline.cn", preferred_cache: "login.partner.microsoftonline.cn", aliases: ["login.partner.microsoftonline.cn", "login.chinacloudapi.cn"] }, { preferred_network: "login.microsoftonline.de", preferred_cache: "login.microsoftonline.de", aliases: ["login.microsoftonline.de"] }, { preferred_network: "login.microsoftonline.us", preferred_cache: "login.microsoftonline.us", aliases: ["login.microsoftonline.us", "login.usgovcloudapi.net"] }, { preferred_network: "login-us.microsoftonline.com", preferred_cache: "login-us.microsoftonline.com", aliases: ["login-us.microsoftonline.com"] }] }, "https://login.microsoftonline.us/consumers/": { tenant_discovery_endpoint: "https://login.microsoftonline.us/consumers/v2.0/.well-known/openid-configuration", "api-version": "1.1", metadata: [{ preferred_network: "login.microsoftonline.com", preferred_cache: "login.windows.net", aliases: ["login.microsoftonline.com", "login.windows.net", "login.microsoft.com", "sts.windows.net"] }, { preferred_network: "login.partner.microsoftonline.cn", preferred_cache: "login.partner.microsoftonline.cn", aliases: ["login.partner.microsoftonline.cn", "login.chinacloudapi.cn"] }, { preferred_network: "login.microsoftonline.de", preferred_cache: "login.microsoftonline.de", aliases: ["login.microsoftonline.de"] }, { preferred_network: "login.microsoftonline.us", preferred_cache: "login.microsoftonline.us", aliases: ["login.microsoftonline.us", "login.usgovcloudapi.net"] }, { preferred_network: "login-us.microsoftonline.com", preferred_cache: "login-us.microsoftonline.com", aliases: ["login-us.microsoftonline.com"] }] }, "https://login.microsoftonline.com/organizations/": { tenant_discovery_endpoint: "https://login.microsoftonline.com/organizations/v2.0/.well-known/openid-configuration", "api-version": "1.1", metadata: [{ preferred_network: "login.microsoftonline.com", preferred_cache: "login.windows.net", aliases: ["login.microsoftonline.com", "login.windows.net", "login.microsoft.com", "sts.windows.net"] }, { preferred_network: "login.partner.microsoftonline.cn", preferred_cache: "login.partner.microsoftonline.cn", aliases: ["login.partner.microsoftonline.cn", "login.chinacloudapi.cn"] }, { preferred_network: "login.microsoftonline.de", preferred_cache: "login.microsoftonline.de", aliases: ["login.microsoftonline.de"] }, { preferred_network: "login.microsoftonline.us", preferred_cache: "login.microsoftonline.us", aliases: ["login.microsoftonline.us", "login.usgovcloudapi.net"] }, { preferred_network: "login-us.microsoftonline.com", preferred_cache: "login-us.microsoftonline.com", aliases: ["login-us.microsoftonline.com"] }] }, "https://login.chinacloudapi.cn/organizations/": { tenant_discovery_endpoint: "https://login.chinacloudapi.cn/organizations/v2.0/.well-known/openid-configuration", "api-version": "1.1", metadata: [{ preferred_network: "login.microsoftonline.com", preferred_cache: "login.windows.net", aliases: ["login.microsoftonline.com", "login.windows.net", "login.microsoft.com", "sts.windows.net"] }, { preferred_network: "login.partner.microsoftonline.cn", preferred_cache: "login.partner.microsoftonline.cn", aliases: ["login.partner.microsoftonline.cn", "login.chinacloudapi.cn"] }, { preferred_network: "login.microsoftonline.de", preferred_cache: "login.microsoftonline.de", aliases: ["login.microsoftonline.de"] }, { preferred_network: "login.microsoftonline.us", preferred_cache: "login.microsoftonline.us", aliases: ["login.microsoftonline.us", "login.usgovcloudapi.net"] }, { preferred_network: "login-us.microsoftonline.com", preferred_cache: "login-us.microsoftonline.com", aliases: ["login-us.microsoftonline.com"] }] }, "https://login.microsoftonline.us/organizations/": { tenant_discovery_endpoint: "https://login.microsoftonline.us/organizations/v2.0/.well-known/openid-configuration", "api-version": "1.1", metadata: [{ preferred_network: "login.microsoftonline.com", preferred_cache: "login.windows.net", aliases: ["login.microsoftonline.com", "login.windows.net", "login.microsoft.com", "sts.windows.net"] }, { preferred_network: "login.partner.microsoftonline.cn", preferred_cache: "login.partner.microsoftonline.cn", aliases: ["login.partner.microsoftonline.cn", "login.chinacloudapi.cn"] }, { preferred_network: "login.microsoftonline.de", preferred_cache: "login.microsoftonline.de", aliases: ["login.microsoftonline.de"] }, { preferred_network: "login.microsoftonline.us", preferred_cache: "login.microsoftonline.us", aliases: ["login.microsoftonline.us", "login.usgovcloudapi.net"] }, { preferred_network: "login-us.microsoftonline.com", preferred_cache: "login-us.microsoftonline.com", aliases: ["login-us.microsoftonline.com"] }] } } }, dr = Kr.endpointMetadata, hr = Kr.instanceDiscoveryMetadata;
/*! @azure/msal-common v13.0.0 2023-05-01 */
var bt;
(function(n) {
  n.AAD = "AAD", n.OIDC = "OIDC";
})(bt || (bt = {}));
/*! @azure/msal-common v13.0.0 2023-05-01 */
var qt = (
  /** @class */
  function() {
    function n() {
      this.expiresAt = fe.nowSeconds() + it.REFRESH_TIME_SECONDS;
    }
    return n.prototype.updateCloudDiscoveryMetadata = function(e, t) {
      this.aliases = e.aliases, this.preferred_cache = e.preferred_cache, this.preferred_network = e.preferred_network, this.aliasesFromNetwork = t;
    }, n.prototype.updateEndpointMetadata = function(e, t) {
      this.authorization_endpoint = e.authorization_endpoint, this.token_endpoint = e.token_endpoint, this.end_session_endpoint = e.end_session_endpoint, this.issuer = e.issuer, this.endpointsFromNetwork = t, this.jwks_uri = e.jwks_uri;
    }, n.prototype.updateCanonicalAuthority = function(e) {
      this.canonical_authority = e;
    }, n.prototype.resetExpiresAt = function() {
      this.expiresAt = fe.nowSeconds() + it.REFRESH_TIME_SECONDS;
    }, n.prototype.isExpired = function() {
      return this.expiresAt <= fe.nowSeconds();
    }, n.isAuthorityMetadataEntity = function(e, t) {
      return t ? e.indexOf(it.CACHE_KEY) === 0 && t.hasOwnProperty("aliases") && t.hasOwnProperty("preferred_cache") && t.hasOwnProperty("preferred_network") && t.hasOwnProperty("canonical_authority") && t.hasOwnProperty("authorization_endpoint") && t.hasOwnProperty("token_endpoint") && t.hasOwnProperty("issuer") && t.hasOwnProperty("aliasesFromNetwork") && t.hasOwnProperty("endpointsFromNetwork") && t.hasOwnProperty("expiresAt") && t.hasOwnProperty("jwks_uri") : !1;
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
function Cn(n) {
  return n.hasOwnProperty("tenant_discovery_endpoint") && n.hasOwnProperty("metadata");
}
/*! @azure/msal-common v13.0.0 2023-05-01 */
function En(n) {
  return n.hasOwnProperty("error") && n.hasOwnProperty("error_description");
}
/*! @azure/msal-common v13.0.0 2023-05-01 */
var _n = (
  /** @class */
  function() {
    function n(e, t, r) {
      this.networkInterface = e, this.performanceClient = t, this.correlationId = r;
    }
    return n.prototype.detectRegion = function(e, t) {
      var r, o, i, a;
      return O(this, void 0, void 0, function() {
        var s, c, u, l, d;
        return U(this, function(p) {
          switch (p.label) {
            case 0:
              if ((r = this.performanceClient) === null || r === void 0 || r.addQueueMeasurement(g.RegionDiscoveryDetectRegion, this.correlationId), s = e, s)
                return [3, 8];
              c = n.IMDS_OPTIONS, p.label = 1;
            case 1:
              return p.trys.push([1, 6, , 7]), (o = this.performanceClient) === null || o === void 0 || o.setPreQueueTime(g.RegionDiscoveryGetRegionFromIMDS, this.correlationId), [4, this.getRegionFromIMDS(h.IMDS_VERSION, c)];
            case 2:
              return u = p.sent(), u.status === Ye.httpSuccess && (s = u.body, t.region_source = Pe.IMDS), u.status !== Ye.httpBadRequest ? [3, 5] : ((i = this.performanceClient) === null || i === void 0 || i.setPreQueueTime(g.RegionDiscoveryGetCurrentVersion, this.correlationId), [4, this.getCurrentVersion(c)]);
            case 3:
              return l = p.sent(), l ? ((a = this.performanceClient) === null || a === void 0 || a.setPreQueueTime(g.RegionDiscoveryGetRegionFromIMDS, this.correlationId), [4, this.getRegionFromIMDS(l, c)]) : (t.region_source = Pe.FAILED_AUTO_DETECTION, [2, null]);
            case 4:
              d = p.sent(), d.status === Ye.httpSuccess && (s = d.body, t.region_source = Pe.IMDS), p.label = 5;
            case 5:
              return [3, 7];
            case 6:
              return p.sent(), t.region_source = Pe.FAILED_AUTO_DETECTION, [2, null];
            case 7:
              return [3, 9];
            case 8:
              t.region_source = Pe.ENVIRONMENT_VARIABLE, p.label = 9;
            case 9:
              return s || (t.region_source = Pe.FAILED_AUTO_DETECTION), [2, s || null];
          }
        });
      });
    }, n.prototype.getRegionFromIMDS = function(e, t) {
      var r;
      return O(this, void 0, void 0, function() {
        return U(this, function(o) {
          return (r = this.performanceClient) === null || r === void 0 || r.addQueueMeasurement(g.RegionDiscoveryGetRegionFromIMDS, this.correlationId), [2, this.networkInterface.sendGetRequestAsync(h.IMDS_ENDPOINT + "?api-version=" + e + "&format=text", t, h.IMDS_TIMEOUT)];
        });
      });
    }, n.prototype.getCurrentVersion = function(e) {
      var t;
      return O(this, void 0, void 0, function() {
        var r;
        return U(this, function(o) {
          switch (o.label) {
            case 0:
              (t = this.performanceClient) === null || t === void 0 || t.addQueueMeasurement(g.RegionDiscoveryGetCurrentVersion, this.correlationId), o.label = 1;
            case 1:
              return o.trys.push([1, 3, , 4]), [4, this.networkInterface.sendGetRequestAsync(h.IMDS_ENDPOINT + "?format=json", e)];
            case 2:
              return r = o.sent(), r.status === Ye.httpBadRequest && r.body && r.body["newest-versions"] && r.body["newest-versions"].length > 0 ? [2, r.body["newest-versions"][0]] : [2, null];
            case 3:
              return o.sent(), [2, null];
            case 4:
              return [
                2
                /*return*/
              ];
          }
        });
      });
    }, n.IMDS_OPTIONS = {
      headers: {
        Metadata: "true"
      }
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var dt = (
  /** @class */
  function() {
    function n(e, t, r, o, i, a, s) {
      this.canonicalAuthority = e, this._canonicalAuthority.validateAsUri(), this.networkInterface = t, this.cacheManager = r, this.authorityOptions = o, this.regionDiscoveryMetadata = { region_used: void 0, region_source: void 0, region_outcome: void 0 }, this.logger = i, this.performanceClient = a, this.correlationId = s, this.regionDiscovery = new _n(t, this.performanceClient, this.correlationId);
    }
    return Object.defineProperty(n.prototype, "authorityType", {
      // See above for AuthorityType
      get: function() {
        if (this.canonicalAuthorityUrlComponents.HostNameAndPort.endsWith(h.CIAM_AUTH_URL))
          return se.Ciam;
        var e = this.canonicalAuthorityUrlComponents.PathSegments;
        if (e.length)
          switch (e[0].toLowerCase()) {
            case h.ADFS:
              return se.Adfs;
            case h.DSTS:
              return se.Dsts;
          }
        return se.Default;
      },
      enumerable: !1,
      configurable: !0
    }), Object.defineProperty(n.prototype, "protocolMode", {
      /**
       * ProtocolMode enum representing the way endpoints are constructed.
       */
      get: function() {
        return this.authorityOptions.protocolMode;
      },
      enumerable: !1,
      configurable: !0
    }), Object.defineProperty(n.prototype, "options", {
      /**
       * Returns authorityOptions which can be used to reinstantiate a new authority instance
       */
      get: function() {
        return this.authorityOptions;
      },
      enumerable: !1,
      configurable: !0
    }), Object.defineProperty(n.prototype, "canonicalAuthority", {
      /**
       * A URL that is the authority set by the developer
       */
      get: function() {
        return this._canonicalAuthority.urlString;
      },
      /**
       * Sets canonical authority.
       */
      set: function(e) {
        this._canonicalAuthority = new F(e), this._canonicalAuthority.validateAsUri(), this._canonicalAuthorityUrlComponents = null;
      },
      enumerable: !1,
      configurable: !0
    }), Object.defineProperty(n.prototype, "canonicalAuthorityUrlComponents", {
      /**
       * Get authority components.
       */
      get: function() {
        return this._canonicalAuthorityUrlComponents || (this._canonicalAuthorityUrlComponents = this._canonicalAuthority.getUrlComponents()), this._canonicalAuthorityUrlComponents;
      },
      enumerable: !1,
      configurable: !0
    }), Object.defineProperty(n.prototype, "hostnameAndPort", {
      /**
       * Get hostname and port i.e. login.microsoftonline.com
       */
      get: function() {
        return this.canonicalAuthorityUrlComponents.HostNameAndPort.toLowerCase();
      },
      enumerable: !1,
      configurable: !0
    }), Object.defineProperty(n.prototype, "tenant", {
      /**
       * Get tenant for authority.
       */
      get: function() {
        return this.canonicalAuthorityUrlComponents.PathSegments[0];
      },
      enumerable: !1,
      configurable: !0
    }), Object.defineProperty(n.prototype, "authorizationEndpoint", {
      /**
       * OAuth /authorize endpoint for requests
       */
      get: function() {
        if (this.discoveryComplete()) {
          var e = this.replacePath(this.metadata.authorization_endpoint);
          return this.replaceTenant(e);
        } else
          throw w.createEndpointDiscoveryIncompleteError("Discovery incomplete.");
      },
      enumerable: !1,
      configurable: !0
    }), Object.defineProperty(n.prototype, "tokenEndpoint", {
      /**
       * OAuth /token endpoint for requests
       */
      get: function() {
        if (this.discoveryComplete()) {
          var e = this.replacePath(this.metadata.token_endpoint);
          return this.replaceTenant(e);
        } else
          throw w.createEndpointDiscoveryIncompleteError("Discovery incomplete.");
      },
      enumerable: !1,
      configurable: !0
    }), Object.defineProperty(n.prototype, "deviceCodeEndpoint", {
      get: function() {
        if (this.discoveryComplete()) {
          var e = this.replacePath(this.metadata.token_endpoint.replace("/token", "/devicecode"));
          return this.replaceTenant(e);
        } else
          throw w.createEndpointDiscoveryIncompleteError("Discovery incomplete.");
      },
      enumerable: !1,
      configurable: !0
    }), Object.defineProperty(n.prototype, "endSessionEndpoint", {
      /**
       * OAuth logout endpoint for requests
       */
      get: function() {
        if (this.discoveryComplete()) {
          if (!this.metadata.end_session_endpoint)
            throw w.createLogoutNotSupportedError();
          var e = this.replacePath(this.metadata.end_session_endpoint);
          return this.replaceTenant(e);
        } else
          throw w.createEndpointDiscoveryIncompleteError("Discovery incomplete.");
      },
      enumerable: !1,
      configurable: !0
    }), Object.defineProperty(n.prototype, "selfSignedJwtAudience", {
      /**
       * OAuth issuer for requests
       */
      get: function() {
        if (this.discoveryComplete()) {
          var e = this.replacePath(this.metadata.issuer);
          return this.replaceTenant(e);
        } else
          throw w.createEndpointDiscoveryIncompleteError("Discovery incomplete.");
      },
      enumerable: !1,
      configurable: !0
    }), Object.defineProperty(n.prototype, "jwksUri", {
      /**
       * Jwks_uri for token signing keys
       */
      get: function() {
        if (this.discoveryComplete()) {
          var e = this.replacePath(this.metadata.jwks_uri);
          return this.replaceTenant(e);
        } else
          throw w.createEndpointDiscoveryIncompleteError("Discovery incomplete.");
      },
      enumerable: !1,
      configurable: !0
    }), n.prototype.replaceTenant = function(e) {
      return e.replace(/{tenant}|{tenantid}/g, this.tenant);
    }, n.prototype.replacePath = function(e) {
      var t = e, r = new F(this.metadata.canonical_authority), o = r.getUrlComponents().PathSegments, i = this.canonicalAuthorityUrlComponents.PathSegments;
      return i.forEach(function(a, s) {
        var c = o[s];
        a !== c && (t = t.replace("/" + c + "/", "/" + a + "/"));
      }), t;
    }, Object.defineProperty(n.prototype, "defaultOpenIdConfigurationEndpoint", {
      /**
       * The default open id configuration endpoint for any canonical authority.
       */
      get: function() {
        return this.authorityType === se.Adfs || this.authorityType === se.Dsts || this.protocolMode === bt.OIDC ? this.canonicalAuthority + ".well-known/openid-configuration" : this.canonicalAuthority + "v2.0/.well-known/openid-configuration";
      },
      enumerable: !1,
      configurable: !0
    }), n.prototype.discoveryComplete = function() {
      return !!this.metadata;
    }, n.prototype.resolveEndpointsAsync = function() {
      var e, t, r;
      return O(this, void 0, void 0, function() {
        var o, i, a, s;
        return U(this, function(c) {
          switch (c.label) {
            case 0:
              return (e = this.performanceClient) === null || e === void 0 || e.addQueueMeasurement(g.AuthorityResolveEndpointsAsync, this.correlationId), o = this.cacheManager.getAuthorityMetadataByAlias(this.hostnameAndPort), o || (o = new qt(), o.updateCanonicalAuthority(this.canonicalAuthority)), (t = this.performanceClient) === null || t === void 0 || t.setPreQueueTime(g.AuthorityUpdateCloudDiscoveryMetadata, this.correlationId), [4, this.updateCloudDiscoveryMetadata(o)];
            case 1:
              return i = c.sent(), this.canonicalAuthority = this.canonicalAuthority.replace(this.hostnameAndPort, o.preferred_network), (r = this.performanceClient) === null || r === void 0 || r.setPreQueueTime(g.AuthorityUpdateEndpointMetadata, this.correlationId), [4, this.updateEndpointMetadata(o)];
            case 2:
              return a = c.sent(), i !== pe.CACHE && a !== pe.CACHE && (o.resetExpiresAt(), o.updateCanonicalAuthority(this.canonicalAuthority)), s = this.cacheManager.generateAuthorityMetadataCacheKey(o.preferred_cache), this.cacheManager.setAuthorityMetadata(s, o), this.metadata = o, [
                2
                /*return*/
              ];
          }
        });
      });
    }, n.prototype.updateEndpointMetadata = function(e) {
      var t, r, o, i, a, s;
      return O(this, void 0, void 0, function() {
        var c, u;
        return U(this, function(l) {
          switch (l.label) {
            case 0:
              return (t = this.performanceClient) === null || t === void 0 || t.addQueueMeasurement(g.AuthorityUpdateEndpointMetadata, this.correlationId), c = this.getEndpointMetadataFromConfig(), c ? (e.updateEndpointMetadata(c, !1), [2, pe.CONFIG]) : this.isAuthoritySameType(e) && e.endpointsFromNetwork && !e.isExpired() ? [2, pe.CACHE] : ((r = this.performanceClient) === null || r === void 0 || r.setPreQueueTime(g.AuthorityGetEndpointMetadataFromNetwork, this.correlationId), [4, this.getEndpointMetadataFromNetwork()]);
            case 1:
              return c = l.sent(), c ? !((o = this.authorityOptions.azureRegionConfiguration) === null || o === void 0) && o.azureRegion ? ((i = this.performanceClient) === null || i === void 0 || i.setPreQueueTime(g.AuthorityUpdateMetadataWithRegionalInformation, this.correlationId), [4, this.updateMetadataWithRegionalInformation(c)]) : [3, 3] : [3, 4];
            case 2:
              c = l.sent(), l.label = 3;
            case 3:
              return e.updateEndpointMetadata(c, !0), [2, pe.NETWORK];
            case 4:
              return u = this.getEndpointMetadataFromHardcodedValues(), u && !this.authorityOptions.skipAuthorityMetadataCache ? !((a = this.authorityOptions.azureRegionConfiguration) === null || a === void 0) && a.azureRegion ? ((s = this.performanceClient) === null || s === void 0 || s.setPreQueueTime(g.AuthorityUpdateMetadataWithRegionalInformation, this.correlationId), [4, this.updateMetadataWithRegionalInformation(u)]) : [3, 6] : [3, 7];
            case 5:
              u = l.sent(), l.label = 6;
            case 6:
              return e.updateEndpointMetadata(u, !1), [2, pe.HARDCODED_VALUES];
            case 7:
              throw w.createUnableToGetOpenidConfigError(this.defaultOpenIdConfigurationEndpoint);
          }
        });
      });
    }, n.prototype.isAuthoritySameType = function(e) {
      var t = new F(e.canonical_authority), r = t.getUrlComponents().PathSegments;
      return r.length === this.canonicalAuthorityUrlComponents.PathSegments.length;
    }, n.prototype.getEndpointMetadataFromConfig = function() {
      if (this.authorityOptions.authorityMetadata)
        try {
          return JSON.parse(this.authorityOptions.authorityMetadata);
        } catch {
          throw G.createInvalidAuthorityMetadataError();
        }
      return null;
    }, n.prototype.getEndpointMetadataFromNetwork = function() {
      var e;
      return O(this, void 0, void 0, function() {
        var t, r;
        return U(this, function(o) {
          switch (o.label) {
            case 0:
              (e = this.performanceClient) === null || e === void 0 || e.addQueueMeasurement(g.AuthorityGetEndpointMetadataFromNetwork, this.correlationId), t = {}, o.label = 1;
            case 1:
              return o.trys.push([1, 3, , 4]), [4, this.networkInterface.sendGetRequestAsync(this.defaultOpenIdConfigurationEndpoint, t)];
            case 2:
              return r = o.sent(), [2, yn(r.body) ? r.body : null];
            case 3:
              return o.sent(), [2, null];
            case 4:
              return [
                2
                /*return*/
              ];
          }
        });
      });
    }, n.prototype.getEndpointMetadataFromHardcodedValues = function() {
      return this.canonicalAuthority in dr ? dr[this.canonicalAuthority] : null;
    }, n.prototype.updateMetadataWithRegionalInformation = function(e) {
      var t, r, o, i, a, s, c;
      return O(this, void 0, void 0, function() {
        var u, l;
        return U(this, function(d) {
          switch (d.label) {
            case 0:
              return (t = this.performanceClient) === null || t === void 0 || t.addQueueMeasurement(g.AuthorityUpdateMetadataWithRegionalInformation, this.correlationId), (r = this.performanceClient) === null || r === void 0 || r.setPreQueueTime(g.RegionDiscoveryDetectRegion, this.correlationId), [4, this.regionDiscovery.detectRegion((o = this.authorityOptions.azureRegionConfiguration) === null || o === void 0 ? void 0 : o.environmentRegion, this.regionDiscoveryMetadata)];
            case 1:
              return u = d.sent(), l = ((i = this.authorityOptions.azureRegionConfiguration) === null || i === void 0 ? void 0 : i.azureRegion) === h.AZURE_REGION_AUTO_DISCOVER_FLAG ? u : (a = this.authorityOptions.azureRegionConfiguration) === null || a === void 0 ? void 0 : a.azureRegion, ((s = this.authorityOptions.azureRegionConfiguration) === null || s === void 0 ? void 0 : s.azureRegion) === h.AZURE_REGION_AUTO_DISCOVER_FLAG ? this.regionDiscoveryMetadata.region_outcome = u ? Le.AUTO_DETECTION_REQUESTED_SUCCESSFUL : Le.AUTO_DETECTION_REQUESTED_FAILED : u ? this.regionDiscoveryMetadata.region_outcome = ((c = this.authorityOptions.azureRegionConfiguration) === null || c === void 0 ? void 0 : c.azureRegion) === u ? Le.CONFIGURED_MATCHES_DETECTED : Le.CONFIGURED_NOT_DETECTED : this.regionDiscoveryMetadata.region_outcome = Le.CONFIGURED_NO_AUTO_DETECTION, l ? (this.regionDiscoveryMetadata.region_used = l, [2, n.replaceWithRegionalInformation(e, l)]) : [2, e];
          }
        });
      });
    }, n.prototype.updateCloudDiscoveryMetadata = function(e) {
      var t, r;
      return O(this, void 0, void 0, function() {
        var o, i, a;
        return U(this, function(s) {
          switch (s.label) {
            case 0:
              return (t = this.performanceClient) === null || t === void 0 || t.addQueueMeasurement(g.AuthorityUpdateCloudDiscoveryMetadata, this.correlationId), this.logger.verbose("Attempting to get cloud discovery metadata in the config"), this.logger.verbosePii("Known Authorities: " + (this.authorityOptions.knownAuthorities || h.NOT_APPLICABLE)), this.logger.verbosePii("Authority Metadata: " + (this.authorityOptions.authorityMetadata || h.NOT_APPLICABLE)), this.logger.verbosePii("Canonical Authority: " + (e.canonical_authority || h.NOT_APPLICABLE)), o = this.getCloudDiscoveryMetadataFromConfig(), o ? (this.logger.verbose("Found cloud discovery metadata in the config."), e.updateCloudDiscoveryMetadata(o, !1), [2, pe.CONFIG]) : (this.logger.verbose("Did not find cloud discovery metadata in the config... Attempting to get cloud discovery metadata from the cache."), i = e.isExpired(), this.isAuthoritySameType(e) && e.aliasesFromNetwork && !i ? (this.logger.verbose("Found metadata in the cache."), [2, pe.CACHE]) : (i && this.logger.verbose("The metadata entity is expired."), this.logger.verbose("Did not find cloud discovery metadata in the cache... Attempting to get cloud discovery metadata from the network."), (r = this.performanceClient) === null || r === void 0 || r.setPreQueueTime(g.AuthorityGetCloudDiscoveryMetadataFromNetwork, this.correlationId), [4, this.getCloudDiscoveryMetadataFromNetwork()]));
            case 1:
              if (o = s.sent(), o)
                return this.logger.verbose("cloud discovery metadata was successfully returned from getCloudDiscoveryMetadataFromNetwork()"), e.updateCloudDiscoveryMetadata(o, !0), [2, pe.NETWORK];
              if (this.logger.verbose("Did not find cloud discovery metadata from the network... Attempting to get cloud discovery metadata from hardcoded values."), a = this.getCloudDiscoveryMetadataFromHarcodedValues(), a && !this.options.skipAuthorityMetadataCache)
                return this.logger.verbose("Found cloud discovery metadata from hardcoded values."), e.updateCloudDiscoveryMetadata(a, !1), [2, pe.HARDCODED_VALUES];
              throw this.logger.error("Did not find cloud discovery metadata from hardcoded values... Metadata could not be obtained from config, cache, network or hardcoded values. Throwing Untrusted Authority Error."), G.createUntrustedAuthorityError();
          }
        });
      });
    }, n.prototype.getCloudDiscoveryMetadataFromConfig = function() {
      if (this.authorityType === se.Ciam)
        return this.logger.verbose("CIAM authorities do not support cloud discovery metadata, generate the aliases from authority host."), n.createCloudDiscoveryMetadataFromHost(this.hostnameAndPort);
      if (this.authorityOptions.cloudDiscoveryMetadata) {
        this.logger.verbose("The cloud discovery metadata has been provided as a network response, in the config.");
        try {
          this.logger.verbose("Attempting to parse the cloud discovery metadata.");
          var e = JSON.parse(this.authorityOptions.cloudDiscoveryMetadata), t = n.getCloudDiscoveryMetadataFromNetworkResponse(e.metadata, this.hostnameAndPort);
          if (this.logger.verbose("Parsed the cloud discovery metadata."), t)
            return this.logger.verbose("There is returnable metadata attached to the parsed cloud discovery metadata."), t;
          this.logger.verbose("There is no metadata attached to the parsed cloud discovery metadata.");
        } catch {
          throw this.logger.verbose("Unable to parse the cloud discovery metadata. Throwing Invalid Cloud Discovery Metadata Error."), G.createInvalidCloudDiscoveryMetadataError();
        }
      }
      return this.isInKnownAuthorities() ? (this.logger.verbose("The host is included in knownAuthorities. Creating new cloud discovery metadata from the host."), n.createCloudDiscoveryMetadataFromHost(this.hostnameAndPort)) : null;
    }, n.prototype.getCloudDiscoveryMetadataFromNetwork = function() {
      var e;
      return O(this, void 0, void 0, function() {
        var t, r, o, i, a, s, c, u;
        return U(this, function(l) {
          switch (l.label) {
            case 0:
              (e = this.performanceClient) === null || e === void 0 || e.addQueueMeasurement(g.AuthorityGetCloudDiscoveryMetadataFromNetwork, this.correlationId), t = "" + h.AAD_INSTANCE_DISCOVERY_ENDPT + this.canonicalAuthority + "oauth2/v2.0/authorize", r = {}, o = null, l.label = 1;
            case 1:
              return l.trys.push([1, 3, , 4]), [4, this.networkInterface.sendGetRequestAsync(t, r)];
            case 2:
              if (i = l.sent(), a = void 0, s = void 0, Cn(i.body))
                a = i.body, s = a.metadata, this.logger.verbosePii("tenant_discovery_endpoint is: " + a.tenant_discovery_endpoint);
              else if (En(i.body)) {
                if (this.logger.warning("A CloudInstanceDiscoveryErrorResponse was returned. The cloud instance discovery network request's status code is: " + i.status), a = i.body, a.error === h.INVALID_INSTANCE)
                  return this.logger.error("The CloudInstanceDiscoveryErrorResponse error is invalid_instance."), [2, null];
                this.logger.warning("The CloudInstanceDiscoveryErrorResponse error is " + a.error), this.logger.warning("The CloudInstanceDiscoveryErrorResponse error description is " + a.error_description), this.logger.warning("Setting the value of the CloudInstanceDiscoveryMetadata (returned from the network) to []"), s = [];
              } else
                return this.logger.error("AAD did not return a CloudInstanceDiscoveryResponse or CloudInstanceDiscoveryErrorResponse"), [2, null];
              return this.logger.verbose("Attempting to find a match between the developer's authority and the CloudInstanceDiscoveryMetadata returned from the network request."), o = n.getCloudDiscoveryMetadataFromNetworkResponse(s, this.hostnameAndPort), [3, 4];
            case 3:
              return c = l.sent(), c instanceof k ? this.logger.error(`There was a network error while attempting to get the cloud discovery instance metadata.
Error: ` + c.errorCode + `
Error Description: ` + c.errorMessage) : (u = c, this.logger.error(`A non-MSALJS error was thrown while attempting to get the cloud instance discovery metadata.
Error: ` + u.name + `
Error Description: ` + u.message)), [2, null];
            case 4:
              return o || (this.logger.warning("The developer's authority was not found within the CloudInstanceDiscoveryMetadata returned from the network request."), this.logger.verbose("Creating custom Authority for custom domain scenario."), o = n.createCloudDiscoveryMetadataFromHost(this.hostnameAndPort)), [2, o];
          }
        });
      });
    }, n.prototype.getCloudDiscoveryMetadataFromHarcodedValues = function() {
      return this.canonicalAuthority in hr ? hr[this.canonicalAuthority] : null;
    }, n.prototype.isInKnownAuthorities = function() {
      var e = this, t = this.authorityOptions.knownAuthorities.filter(function(r) {
        return F.getDomainFromUrl(r).toLowerCase() === e.hostnameAndPort;
      });
      return t.length > 0;
    }, n.generateAuthority = function(e, t) {
      var r;
      if (t && t.azureCloudInstance !== lt.None) {
        var o = t.tenant ? t.tenant : h.DEFAULT_COMMON_TENANT;
        r = t.azureCloudInstance + "/" + o + "/";
      }
      return r || e;
    }, n.createCloudDiscoveryMetadataFromHost = function(e) {
      return {
        preferred_network: e,
        preferred_cache: e,
        aliases: [e]
      };
    }, n.getCloudDiscoveryMetadataFromNetworkResponse = function(e, t) {
      for (var r = 0; r < e.length; r++) {
        var o = e[r];
        if (o.aliases.indexOf(t) > -1)
          return o;
      }
      return null;
    }, n.prototype.getPreferredCache = function() {
      if (this.discoveryComplete())
        return this.metadata.preferred_cache;
      throw w.createEndpointDiscoveryIncompleteError("Discovery incomplete.");
    }, n.prototype.isAlias = function(e) {
      return this.metadata.aliases.indexOf(e) > -1;
    }, n.isPublicCloudAuthority = function(e) {
      return h.KNOWN_PUBLIC_CLOUDS.indexOf(e) >= 0;
    }, n.buildRegionalAuthorityString = function(e, t, r) {
      var o = new F(e);
      o.validateAsUri();
      var i = o.getUrlComponents(), a = t + "." + i.HostNameAndPort;
      this.isPublicCloudAuthority(i.HostNameAndPort) && (a = t + "." + h.REGIONAL_AUTH_PUBLIC_CLOUD_SUFFIX);
      var s = F.constructAuthorityUriFromObject(B(B({}, o.getUrlComponents()), { HostNameAndPort: a })).urlString;
      return r ? s + "?" + r : s;
    }, n.replaceWithRegionalInformation = function(e, t) {
      return e.authorization_endpoint = n.buildRegionalAuthorityString(e.authorization_endpoint, t), e.token_endpoint = n.buildRegionalAuthorityString(e.token_endpoint, t, h.REGIONAL_AUTH_NON_MSI_QUERY_STRING), e.end_session_endpoint && (e.end_session_endpoint = n.buildRegionalAuthorityString(e.end_session_endpoint, t)), e;
    }, n.transformCIAMAuthority = function(e) {
      var t = e.endsWith(h.FORWARD_SLASH) ? e : "" + e + h.FORWARD_SLASH, r = new F(e), o = r.getUrlComponents();
      if (o.PathSegments.length === 0 && o.HostNameAndPort.endsWith(h.CIAM_AUTH_URL)) {
        var i = o.HostNameAndPort.split(".")[0];
        t = "" + t + i + h.AAD_TENANT_DOMAIN_SUFFIX;
      }
      return t;
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var Rt = (
  /** @class */
  function() {
    function n() {
    }
    return n.createDiscoveredInstance = function(e, t, r, o, i, a, s) {
      return O(this, void 0, void 0, function() {
        var c, u, l;
        return U(this, function(d) {
          switch (d.label) {
            case 0:
              a == null || a.addQueueMeasurement(g.AuthorityFactoryCreateDiscoveredInstance, s), c = dt.transformCIAMAuthority(e), u = n.createInstance(c, t, r, o, i, a, s), d.label = 1;
            case 1:
              return d.trys.push([1, 3, , 4]), a == null || a.setPreQueueTime(g.AuthorityResolveEndpointsAsync, s), [4, u.resolveEndpointsAsync()];
            case 2:
              return d.sent(), [2, u];
            case 3:
              throw l = d.sent(), w.createEndpointDiscoveryIncompleteError(l);
            case 4:
              return [
                2
                /*return*/
              ];
          }
        });
      });
    }, n.createInstance = function(e, t, r, o, i, a, s) {
      if (I.isEmpty(e))
        throw G.createUrlEmptyError();
      return new dt(e, t, r, o, i, a, s);
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var Nt = (
  /** @class */
  function() {
    function n() {
      this.failedRequests = [], this.errors = [], this.cacheHits = 0;
    }
    return n.isServerTelemetryEntity = function(e, t) {
      var r = e.indexOf(W.CACHE_KEY) === 0, o = !0;
      return t && (o = t.hasOwnProperty("failedRequests") && t.hasOwnProperty("errors") && t.hasOwnProperty("cacheHits")), r && o;
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var pr = (
  /** @class */
  function() {
    function n() {
    }
    return n.isThrottlingEntity = function(e, t) {
      var r = !1;
      e && (r = e.indexOf(at.THROTTLING_PREFIX) === 0);
      var o = !0;
      return t && (o = t.hasOwnProperty("throttleTime")), r && o;
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var Tn = {
  sendGetRequestAsync: function() {
    var n = "Network interface - sendGetRequestAsync() has not been implemented for the Network interface.";
    return Promise.reject(k.createUnexpectedError(n));
  },
  sendPostRequestAsync: function() {
    var n = "Network interface - sendPostRequestAsync() has not been implemented for the Network interface.";
    return Promise.reject(k.createUnexpectedError(n));
  }
};
/*! @azure/msal-common v13.0.0 2023-05-01 */
var vt = {
  missingKidError: {
    code: "missing_kid_error",
    desc: "The JOSE Header for the requested JWT, JWS or JWK object requires a keyId to be configured as the 'kid' header claim. No 'kid' value was provided."
  },
  missingAlgError: {
    code: "missing_alg_error",
    desc: "The JOSE Header for the requested JWT, JWS or JWK object requires an algorithm to be specified as the 'alg' header claim. No 'alg' value was provided."
  }
}, fr = (
  /** @class */
  function(n) {
    ue(e, n);
    function e(t, r) {
      var o = n.call(this, t, r) || this;
      return o.name = "JoseHeaderError", Object.setPrototypeOf(o, e.prototype), o;
    }
    return e.createMissingKidError = function() {
      return new e(vt.missingKidError.code, vt.missingKidError.desc);
    }, e.createMissingAlgError = function() {
      return new e(vt.missingAlgError.code, vt.missingAlgError.desc);
    }, e;
  }(k)
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var In = (
  /** @class */
  function() {
    function n(e) {
      this.typ = e.typ, this.alg = e.alg, this.kid = e.kid;
    }
    return n.getShrHeaderString = function(e) {
      if (!e.kid)
        throw fr.createMissingKidError();
      if (!e.alg)
        throw fr.createMissingAlgError();
      var t = new n({
        // Access Token PoP headers must have type pop, but the type header can be overriden for special cases
        typ: e.typ || xt.Pop,
        kid: e.kid,
        alg: e.alg
      });
      return JSON.stringify(t);
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var wn = (
  /** @class */
  function() {
    function n(e, t) {
      this.cacheOutcome = De.NO_CACHE_HIT, this.cacheManager = t, this.apiId = e.apiId, this.correlationId = e.correlationId, this.wrapperSKU = e.wrapperSKU || h.EMPTY_STRING, this.wrapperVer = e.wrapperVer || h.EMPTY_STRING, this.telemetryCacheKey = W.CACHE_KEY + V.CACHE_KEY_SEPARATOR + e.clientId;
    }
    return n.prototype.generateCurrentRequestHeaderValue = function() {
      var e = "" + this.apiId + W.VALUE_SEPARATOR + this.cacheOutcome, t = [this.wrapperSKU, this.wrapperVer].join(W.VALUE_SEPARATOR), r = this.getRegionDiscoveryFields(), o = [e, r].join(W.VALUE_SEPARATOR);
      return [W.SCHEMA_VERSION, o, t].join(W.CATEGORY_SEPARATOR);
    }, n.prototype.generateLastRequestHeaderValue = function() {
      var e = this.getLastRequests(), t = n.maxErrorsToSend(e), r = e.failedRequests.slice(0, 2 * t).join(W.VALUE_SEPARATOR), o = e.errors.slice(0, t).join(W.VALUE_SEPARATOR), i = e.errors.length, a = t < i ? W.OVERFLOW_TRUE : W.OVERFLOW_FALSE, s = [i, a].join(W.VALUE_SEPARATOR);
      return [W.SCHEMA_VERSION, e.cacheHits, r, o, s].join(W.CATEGORY_SEPARATOR);
    }, n.prototype.cacheFailedRequest = function(e) {
      var t = this.getLastRequests();
      t.errors.length >= W.MAX_CACHED_ERRORS && (t.failedRequests.shift(), t.failedRequests.shift(), t.errors.shift()), t.failedRequests.push(this.apiId, this.correlationId), I.isEmpty(e.subError) ? I.isEmpty(e.errorCode) ? e && e.toString() ? t.errors.push(e.toString()) : t.errors.push(W.UNKNOWN_ERROR) : t.errors.push(e.errorCode) : t.errors.push(e.subError), this.cacheManager.setServerTelemetry(this.telemetryCacheKey, t);
    }, n.prototype.incrementCacheHits = function() {
      var e = this.getLastRequests();
      return e.cacheHits += 1, this.cacheManager.setServerTelemetry(this.telemetryCacheKey, e), e.cacheHits;
    }, n.prototype.getLastRequests = function() {
      var e = new Nt(), t = this.cacheManager.getServerTelemetry(this.telemetryCacheKey);
      return t || e;
    }, n.prototype.clearTelemetryCache = function() {
      var e = this.getLastRequests(), t = n.maxErrorsToSend(e), r = e.errors.length;
      if (t === r)
        this.cacheManager.removeItem(this.telemetryCacheKey);
      else {
        var o = new Nt();
        o.failedRequests = e.failedRequests.slice(t * 2), o.errors = e.errors.slice(t), this.cacheManager.setServerTelemetry(this.telemetryCacheKey, o);
      }
    }, n.maxErrorsToSend = function(e) {
      var t, r = 0, o = 0, i = e.errors.length;
      for (t = 0; t < i; t++) {
        var a = e.failedRequests[2 * t] || h.EMPTY_STRING, s = e.failedRequests[2 * t + 1] || h.EMPTY_STRING, c = e.errors[t] || h.EMPTY_STRING;
        if (o += a.toString().length + s.toString().length + c.length + 3, o < W.MAX_LAST_HEADER_BYTES)
          r += 1;
        else
          break;
      }
      return r;
    }, n.prototype.getRegionDiscoveryFields = function() {
      var e = [];
      return e.push(this.regionUsed || h.EMPTY_STRING), e.push(this.regionSource || h.EMPTY_STRING), e.push(this.regionOutcome || h.EMPTY_STRING), e.join(",");
    }, n.prototype.updateRegionDiscoveryMetadata = function(e) {
      this.regionUsed = e.region_used, this.regionSource = e.region_source, this.regionOutcome = e.region_outcome;
    }, n.prototype.setCacheOutcome = function(e) {
      this.cacheOutcome = e;
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var Br = (
  /** @class */
  function() {
    function n(e, t, r, o, i, a) {
      this.authority = t, this.libraryName = o, this.libraryVersion = i, this.applicationTelemetry = a, this.clientId = e, this.logger = r, this.callbacks = /* @__PURE__ */ new Map(), this.eventsByCorrelationId = /* @__PURE__ */ new Map(), this.queueMeasurements = /* @__PURE__ */ new Map(), this.preQueueTimeByCorrelationId = /* @__PURE__ */ new Map();
    }
    return n.prototype.startPerformanceMeasurement = function(e, t) {
      return {};
    }, n.prototype.startPerformanceMeasuremeant = function(e, t) {
      return {};
    }, n.prototype.getIntFields = function() {
      return gn;
    }, n.prototype.getPreQueueTime = function(e, t) {
      var r = this.preQueueTimeByCorrelationId.get(t);
      if (r) {
        if (r.name !== e) {
          this.logger.trace("PerformanceClient.getPreQueueTime: no pre-queue time found for " + e + ", unable to add queue measurement");
          return;
        }
      } else {
        this.logger.trace("PerformanceClient.getPreQueueTime: no pre-queue times found for correlationId: " + t + ", unable to add queue measurement");
        return;
      }
      return r.time;
    }, n.prototype.calculateQueuedTime = function(e, t) {
      return e < 1 ? (this.logger.trace("PerformanceClient: preQueueTime should be a positive integer and not " + e), 0) : t < 1 ? (this.logger.trace("PerformanceClient: currentTime should be a positive integer and not " + t), 0) : t < e ? (this.logger.trace("PerformanceClient: currentTime is less than preQueueTime, check how time is being retrieved"), 0) : t - e;
    }, n.prototype.addQueueMeasurement = function(e, t, r, o) {
      if (!t) {
        this.logger.trace("PerformanceClient.addQueueMeasurement: correlationId not provided for " + e + ", cannot add queue measurement");
        return;
      }
      if (r === 0)
        this.logger.trace("PerformanceClient.addQueueMeasurement: queue time provided for " + e + " is " + r);
      else if (!r) {
        this.logger.trace("PerformanceClient.addQueueMeasurement: no queue time provided for " + e);
        return;
      }
      var i = { eventName: e, queueTime: r, manuallyCompleted: o }, a = this.queueMeasurements.get(t);
      if (a)
        a.push(i), this.queueMeasurements.set(t, a);
      else {
        this.logger.trace("PerformanceClient.addQueueMeasurement: adding correlationId " + t + " to queue measurements");
        var s = [i];
        this.queueMeasurements.set(t, s);
      }
      this.preQueueTimeByCorrelationId.delete(t);
    }, n.prototype.startMeasurement = function(e, t) {
      var r = this, o, i, a = t || this.generateId();
      t || this.logger.info("PerformanceClient: No correlation id provided for " + e + ", generating", a), this.logger.trace("PerformanceClient: Performance measurement started for " + e, a);
      var s = this.startPerformanceMeasuremeant(e, a);
      s.startMeasurement();
      var c = {
        eventId: this.generateId(),
        status: At.InProgress,
        authority: this.authority,
        libraryName: this.libraryName,
        libraryVersion: this.libraryVersion,
        clientId: this.clientId,
        name: e,
        startTimeMs: Date.now(),
        correlationId: a,
        appName: (o = this.applicationTelemetry) === null || o === void 0 ? void 0 : o.appName,
        appVersion: (i = this.applicationTelemetry) === null || i === void 0 ? void 0 : i.appVersion
      };
      return this.cacheEventByCorrelationId(c), {
        endMeasurement: function(u) {
          return r.endMeasurement(B(B({}, c), u), s);
        },
        discardMeasurement: function() {
          return r.discardMeasurements(c.correlationId);
        },
        addStaticFields: function(u) {
          return r.addStaticFields(u, c.correlationId);
        },
        increment: function(u) {
          return r.increment(u, c.correlationId);
        },
        measurement: s,
        event: c
      };
    }, n.prototype.endMeasurement = function(e, t) {
      var r = this, o, i, a = this.eventsByCorrelationId.get(e.correlationId);
      if (!a)
        return this.logger.trace("PerformanceClient: Measurement not found for " + e.eventId, e.correlationId), null;
      var s = e.eventId === a.eventId, c = {
        totalQueueTime: 0,
        totalQueueCount: 0,
        manuallyCompletedCount: 0
      };
      s ? (c = this.getQueueInfo(e.correlationId), this.discardCache(a.correlationId)) : (o = a.incompleteSubMeasurements) === null || o === void 0 || o.delete(e.eventId), t == null || t.endMeasurement();
      var u = t == null ? void 0 : t.flushMeasurement();
      if (!u)
        return this.logger.trace("PerformanceClient: Performance measurement not taken", a.correlationId), null;
      if (this.logger.trace("PerformanceClient: Performance measurement ended for " + e.name + ": " + u + " ms", e.correlationId), !s)
        return a[e.name + "DurationMs"] = Math.floor(u), B({}, a);
      var l = B(B({}, a), e), d = 0;
      return (i = l.incompleteSubMeasurements) === null || i === void 0 || i.forEach(function(p) {
        r.logger.trace("PerformanceClient: Incomplete submeasurement " + p.name + " found for " + e.name, l.correlationId), d++;
      }), l.incompleteSubMeasurements = void 0, l = B(B({}, l), { durationMs: Math.round(u), queuedTimeMs: c.totalQueueTime, queuedCount: c.totalQueueCount, queuedManuallyCompletedCount: c.manuallyCompletedCount, status: At.Completed, incompleteSubsCount: d }), this.truncateIntegralFields(l, this.getIntFields()), this.emitEvents([l], e.correlationId), l;
    }, n.prototype.addStaticFields = function(e, t) {
      this.logger.trace("PerformanceClient: Updating static fields");
      var r = this.eventsByCorrelationId.get(t);
      r ? this.eventsByCorrelationId.set(t, B(B({}, r), e)) : this.logger.trace("PerformanceClient: Event not found for", t);
    }, n.prototype.increment = function(e, t) {
      this.logger.trace("PerformanceClient: Updating counters");
      var r = this.eventsByCorrelationId.get(t);
      if (r)
        for (var o in e)
          r.hasOwnProperty(o) || (r[o] = 0), r[o] += e[o];
      else
        this.logger.trace("PerformanceClient: Event not found for", t);
    }, n.prototype.cacheEventByCorrelationId = function(e) {
      var t = this.eventsByCorrelationId.get(e.correlationId);
      t ? (this.logger.trace("PerformanceClient: Performance measurement for " + e.name + " added/updated", e.correlationId), t.incompleteSubMeasurements = t.incompleteSubMeasurements || /* @__PURE__ */ new Map(), t.incompleteSubMeasurements.set(e.eventId, { name: e.name, startTimeMs: e.startTimeMs })) : (this.logger.trace("PerformanceClient: Performance measurement for " + e.name + " started", e.correlationId), this.eventsByCorrelationId.set(e.correlationId, B({}, e)));
    }, n.prototype.getQueueInfo = function(e) {
      var t = this.queueMeasurements.get(e);
      t || this.logger.trace("PerformanceClient: no queue measurements found for for correlationId: " + e);
      var r = 0, o = 0, i = 0;
      return t == null || t.forEach(function(a) {
        r += a.queueTime, o++, i += a.manuallyCompleted ? 1 : 0;
      }), {
        totalQueueTime: r,
        totalQueueCount: o,
        manuallyCompletedCount: i
      };
    }, n.prototype.discardMeasurements = function(e) {
      this.logger.trace("PerformanceClient: Performance measurements discarded", e), this.eventsByCorrelationId.delete(e);
    }, n.prototype.discardCache = function(e) {
      this.discardMeasurements(e), this.logger.trace("PerformanceClient: QueueMeasurements discarded", e), this.queueMeasurements.delete(e), this.logger.trace("PerformanceClient: Pre-queue times discarded", e), this.preQueueTimeByCorrelationId.delete(e);
    }, n.prototype.addPerformanceCallback = function(e) {
      var t = this.generateId();
      return this.callbacks.set(t, e), this.logger.verbose("PerformanceClient: Performance callback registered with id: " + t), t;
    }, n.prototype.removePerformanceCallback = function(e) {
      var t = this.callbacks.delete(e);
      return t ? this.logger.verbose("PerformanceClient: Performance callback " + e + " removed.") : this.logger.verbose("PerformanceClient: Performance callback " + e + " not removed."), t;
    }, n.prototype.emitEvents = function(e, t) {
      var r = this;
      this.logger.verbose("PerformanceClient: Emitting performance events", t), this.callbacks.forEach(function(o, i) {
        r.logger.trace("PerformanceClient: Emitting event to callback " + i, t), o.apply(null, [e]);
      });
    }, n.prototype.truncateIntegralFields = function(e, t) {
      t.forEach(function(r) {
        r in e && typeof e[r] == "number" && (e[r] = Math.floor(e[r]));
      });
    }, n;
  }()
);
/*! @azure/msal-common v13.0.0 2023-05-01 */
var gr = (
  /** @class */
  function() {
    function n() {
    }
    return n.prototype.startMeasurement = function() {
    }, n.prototype.endMeasurement = function() {
    }, n.prototype.flushMeasurement = function() {
      return null;
    }, n;
  }()
), Sn = (
  /** @class */
  function(n) {
    ue(e, n);
    function e() {
      return n !== null && n.apply(this, arguments) || this;
    }
    return e.prototype.generateId = function() {
      return "callback-id";
    }, e.prototype.startPerformanceMeasuremeant = function() {
      return new gr();
    }, e.prototype.startPerformanceMeasurement = function() {
      return new gr();
    }, e.prototype.calculateQueuedTime = function(t, r) {
      return 0;
    }, e.prototype.addQueueMeasurement = function(t, r, o) {
    }, e.prototype.setPreQueueTime = function(t, r) {
    }, e;
  }(Br)
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var E = {
  pkceNotGenerated: {
    code: "pkce_not_created",
    desc: "The PKCE code challenge and verifier could not be generated."
  },
  cryptoDoesNotExist: {
    code: "crypto_nonexistent",
    desc: "The crypto object or function is not available."
  },
  httpMethodNotImplementedError: {
    code: "http_method_not_implemented",
    desc: "The HTTP method given has not been implemented in this library."
  },
  emptyNavigateUriError: {
    code: "empty_navigate_uri",
    desc: "Navigation URI is empty. Please check stack trace for more info."
  },
  hashEmptyError: {
    code: "hash_empty_error",
    desc: "Hash value cannot be processed because it is empty. Please verify that your redirectUri is not clearing the hash. For more visit: aka.ms/msaljs/browser-errors."
  },
  hashDoesNotContainStateError: {
    code: "no_state_in_hash",
    desc: "Hash does not contain state. Please verify that the request originated from msal."
  },
  hashDoesNotContainKnownPropertiesError: {
    code: "hash_does_not_contain_known_properties",
    desc: "Hash does not contain known properites. Please verify that your redirectUri is not changing the hash. For more visit: aka.ms/msaljs/browser-errors."
  },
  unableToParseStateError: {
    code: "unable_to_parse_state",
    desc: "Unable to parse state. Please verify that the request originated from msal."
  },
  stateInteractionTypeMismatchError: {
    code: "state_interaction_type_mismatch",
    desc: "Hash contains state but the interaction type does not match the caller."
  },
  interactionInProgress: {
    code: "interaction_in_progress",
    desc: "Interaction is currently in progress. Please ensure that this interaction has been completed before calling an interactive API.  For more visit: aka.ms/msaljs/browser-errors."
  },
  popupWindowError: {
    code: "popup_window_error",
    desc: "Error opening popup window. This can happen if you are using IE or if popups are blocked in the browser."
  },
  emptyWindowError: {
    code: "empty_window_error",
    desc: "window.open returned null or undefined window object."
  },
  userCancelledError: {
    code: "user_cancelled",
    desc: "User cancelled the flow."
  },
  monitorPopupTimeoutError: {
    code: "monitor_window_timeout",
    desc: "Token acquisition in popup failed due to timeout. For more visit: aka.ms/msaljs/browser-errors."
  },
  monitorIframeTimeoutError: {
    code: "monitor_window_timeout",
    desc: "Token acquisition in iframe failed due to timeout. For more visit: aka.ms/msaljs/browser-errors."
  },
  redirectInIframeError: {
    code: "redirect_in_iframe",
    desc: "Redirects are not supported for iframed or brokered applications. Please ensure you are using MSAL.js in a top frame of the window if using the redirect APIs, or use the popup APIs."
  },
  blockTokenRequestsInHiddenIframeError: {
    code: "block_iframe_reload",
    desc: "Request was blocked inside an iframe because MSAL detected an authentication response. For more visit: aka.ms/msaljs/browser-errors"
  },
  blockAcquireTokenInPopupsError: {
    code: "block_nested_popups",
    desc: "Request was blocked inside a popup because MSAL detected it was running in a popup."
  },
  iframeClosedPrematurelyError: {
    code: "iframe_closed_prematurely",
    desc: "The iframe being monitored was closed prematurely."
  },
  silentLogoutUnsupportedError: {
    code: "silent_logout_unsupported",
    desc: "Silent logout not supported. Please call logoutRedirect or logoutPopup instead."
  },
  noAccountError: {
    code: "no_account_error",
    desc: "No account object provided to acquireTokenSilent and no active account has been set. Please call setActiveAccount or provide an account on the request."
  },
  silentPromptValueError: {
    code: "silent_prompt_value_error",
    desc: "The value given for the prompt value is not valid for silent requests - must be set to 'none' or 'no_session'."
  },
  noTokenRequestCacheError: {
    code: "no_token_request_cache_error",
    desc: "No token request found in cache."
  },
  unableToParseTokenRequestCacheError: {
    code: "unable_to_parse_token_request_cache_error",
    desc: "The cached token request could not be parsed."
  },
  noCachedAuthorityError: {
    code: "no_cached_authority_error",
    desc: "No cached authority found."
  },
  authRequestNotSet: {
    code: "auth_request_not_set_error",
    desc: "Auth Request not set. Please ensure initiateAuthRequest was called from the InteractionHandler"
  },
  invalidCacheType: {
    code: "invalid_cache_type",
    desc: "Invalid cache type"
  },
  notInBrowserEnvironment: {
    code: "non_browser_environment",
    desc: "Login and token requests are not supported in non-browser environments."
  },
  databaseNotOpen: {
    code: "database_not_open",
    desc: "Database is not open!"
  },
  noNetworkConnectivity: {
    code: "no_network_connectivity",
    desc: "No network connectivity. Check your internet connection."
  },
  postRequestFailed: {
    code: "post_request_failed",
    desc: "Network request failed: If the browser threw a CORS error, check that the redirectUri is registered in the Azure App Portal as type 'SPA'"
  },
  getRequestFailed: {
    code: "get_request_failed",
    desc: "Network request failed. Please check the network trace to determine root cause."
  },
  failedToParseNetworkResponse: {
    code: "failed_to_parse_response",
    desc: "Failed to parse network response. Check network trace."
  },
  unableToLoadTokenError: {
    code: "unable_to_load_token",
    desc: "Error loading token to cache."
  },
  signingKeyNotFoundInStorage: {
    code: "crypto_key_not_found",
    desc: "Cryptographic Key or Keypair not found in browser storage."
  },
  authCodeRequired: {
    code: "auth_code_required",
    desc: "An authorization code must be provided (as the `code` property on the request) to this flow."
  },
  authCodeOrNativeAccountRequired: {
    code: "auth_code_or_nativeAccountId_required",
    desc: "An authorization code or nativeAccountId must be provided to this flow."
  },
  spaCodeAndNativeAccountPresent: {
    code: "spa_code_and_nativeAccountId_present",
    desc: "Request cannot contain both spa code and native account id."
  },
  databaseUnavailable: {
    code: "database_unavailable",
    desc: "IndexedDB, which is required for persistent cryptographic key storage, is unavailable. This may be caused by browser privacy features which block persistent storage in third-party contexts."
  },
  unableToAcquireTokenFromNativePlatform: {
    code: "unable_to_acquire_token_from_native_platform",
    desc: "Unable to acquire token from native platform. For a list of possible reasons visit aka.ms/msaljs/browser-errors."
  },
  nativeHandshakeTimeout: {
    code: "native_handshake_timeout",
    desc: "Timed out while attempting to establish connection to browser extension"
  },
  nativeExtensionNotInstalled: {
    code: "native_extension_not_installed",
    desc: "Native extension is not installed. If you think this is a mistake call the initialize function."
  },
  nativeConnectionNotEstablished: {
    code: "native_connection_not_established",
    desc: "Connection to native platform has not been established. Please install a compatible browser extension and run initialize(). For more please visit aka.ms/msaljs/browser-errors."
  },
  nativeBrokerCalledBeforeInitialize: {
    code: "native_broker_called_before_initialize",
    desc: "You must call and await the initialize function before attempting to call any other MSAL API when native brokering is enabled. For more please visit aka.ms/msaljs/browser-errors."
  },
  nativePromptNotSupported: {
    code: "native_prompt_not_supported",
    desc: "The provided prompt is not supported by the native platform. This request should be routed to the web based flow."
  }
}, T = (
  /** @class */
  function(n) {
    X(e, n);
    function e(t, r) {
      var o = n.call(this, t, r) || this;
      return Object.setPrototypeOf(o, e.prototype), o.name = "BrowserAuthError", o;
    }
    return e.createPkceNotGeneratedError = function(t) {
      return new e(E.pkceNotGenerated.code, E.pkceNotGenerated.desc + " Detail:" + t);
    }, e.createCryptoNotAvailableError = function(t) {
      return new e(E.cryptoDoesNotExist.code, E.cryptoDoesNotExist.desc + " Detail:" + t);
    }, e.createHttpMethodNotImplementedError = function(t) {
      return new e(E.httpMethodNotImplementedError.code, E.httpMethodNotImplementedError.desc + " Given Method: " + t);
    }, e.createEmptyNavigationUriError = function() {
      return new e(E.emptyNavigateUriError.code, E.emptyNavigateUriError.desc);
    }, e.createEmptyHashError = function(t) {
      return new e(E.hashEmptyError.code, E.hashEmptyError.desc + " Given Url: " + t);
    }, e.createHashDoesNotContainStateError = function() {
      return new e(E.hashDoesNotContainStateError.code, E.hashDoesNotContainStateError.desc);
    }, e.createHashDoesNotContainKnownPropertiesError = function() {
      return new e(E.hashDoesNotContainKnownPropertiesError.code, E.hashDoesNotContainKnownPropertiesError.desc);
    }, e.createUnableToParseStateError = function() {
      return new e(E.unableToParseStateError.code, E.unableToParseStateError.desc);
    }, e.createStateInteractionTypeMismatchError = function() {
      return new e(E.stateInteractionTypeMismatchError.code, E.stateInteractionTypeMismatchError.desc);
    }, e.createInteractionInProgressError = function() {
      return new e(E.interactionInProgress.code, E.interactionInProgress.desc);
    }, e.createPopupWindowError = function(t) {
      var r = E.popupWindowError.desc;
      return r = I.isEmpty(t) ? r : r + " Details: " + t, new e(E.popupWindowError.code, r);
    }, e.createEmptyWindowCreatedError = function() {
      return new e(E.emptyWindowError.code, E.emptyWindowError.desc);
    }, e.createUserCancelledError = function() {
      return new e(E.userCancelledError.code, E.userCancelledError.desc);
    }, e.createMonitorPopupTimeoutError = function() {
      return new e(E.monitorPopupTimeoutError.code, E.monitorPopupTimeoutError.desc);
    }, e.createMonitorIframeTimeoutError = function() {
      return new e(E.monitorIframeTimeoutError.code, E.monitorIframeTimeoutError.desc);
    }, e.createRedirectInIframeError = function(t) {
      return new e(E.redirectInIframeError.code, E.redirectInIframeError.desc + " (window.parent !== window) => " + t);
    }, e.createBlockReloadInHiddenIframeError = function() {
      return new e(E.blockTokenRequestsInHiddenIframeError.code, E.blockTokenRequestsInHiddenIframeError.desc);
    }, e.createBlockAcquireTokenInPopupsError = function() {
      return new e(E.blockAcquireTokenInPopupsError.code, E.blockAcquireTokenInPopupsError.desc);
    }, e.createIframeClosedPrematurelyError = function() {
      return new e(E.iframeClosedPrematurelyError.code, E.iframeClosedPrematurelyError.desc);
    }, e.createSilentLogoutUnsupportedError = function() {
      return new e(E.silentLogoutUnsupportedError.code, E.silentLogoutUnsupportedError.desc);
    }, e.createNoAccountError = function() {
      return new e(E.noAccountError.code, E.noAccountError.desc);
    }, e.createSilentPromptValueError = function(t) {
      return new e(E.silentPromptValueError.code, E.silentPromptValueError.desc + " Given value: " + t);
    }, e.createUnableToParseTokenRequestCacheError = function() {
      return new e(E.unableToParseTokenRequestCacheError.code, E.unableToParseTokenRequestCacheError.desc);
    }, e.createNoTokenRequestCacheError = function() {
      return new e(E.noTokenRequestCacheError.code, E.noTokenRequestCacheError.desc);
    }, e.createAuthRequestNotSetError = function() {
      return new e(E.authRequestNotSet.code, E.authRequestNotSet.desc);
    }, e.createNoCachedAuthorityError = function() {
      return new e(E.noCachedAuthorityError.code, E.noCachedAuthorityError.desc);
    }, e.createInvalidCacheTypeError = function() {
      return new e(E.invalidCacheType.code, "" + E.invalidCacheType.desc);
    }, e.createNonBrowserEnvironmentError = function() {
      return new e(E.notInBrowserEnvironment.code, E.notInBrowserEnvironment.desc);
    }, e.createDatabaseNotOpenError = function() {
      return new e(E.databaseNotOpen.code, E.databaseNotOpen.desc);
    }, e.createNoNetworkConnectivityError = function() {
      return new e(E.noNetworkConnectivity.code, E.noNetworkConnectivity.desc);
    }, e.createPostRequestFailedError = function(t, r) {
      return new e(E.postRequestFailed.code, E.postRequestFailed.desc + " | Network client threw: " + t + " | Attempted to reach: " + r.split("?")[0]);
    }, e.createGetRequestFailedError = function(t, r) {
      return new e(E.getRequestFailed.code, E.getRequestFailed.desc + " | Network client threw: " + t + " | Attempted to reach: " + r.split("?")[0]);
    }, e.createFailedToParseNetworkResponseError = function(t) {
      return new e(E.failedToParseNetworkResponse.code, E.failedToParseNetworkResponse.desc + " | Attempted to reach: " + t.split("?")[0]);
    }, e.createUnableToLoadTokenError = function(t) {
      return new e(E.unableToLoadTokenError.code, E.unableToLoadTokenError.desc + " | " + t);
    }, e.createSigningKeyNotFoundInStorageError = function(t) {
      return new e(E.signingKeyNotFoundInStorage.code, E.signingKeyNotFoundInStorage.desc + " | No match found for KeyId: " + t);
    }, e.createAuthCodeRequiredError = function() {
      return new e(E.authCodeRequired.code, E.authCodeRequired.desc);
    }, e.createAuthCodeOrNativeAccountIdRequiredError = function() {
      return new e(E.authCodeOrNativeAccountRequired.code, E.authCodeOrNativeAccountRequired.desc);
    }, e.createSpaCodeAndNativeAccountIdPresentError = function() {
      return new e(E.spaCodeAndNativeAccountPresent.code, E.spaCodeAndNativeAccountPresent.desc);
    }, e.createDatabaseUnavailableError = function() {
      return new e(E.databaseUnavailable.code, E.databaseUnavailable.desc);
    }, e.createUnableToAcquireTokenFromNativePlatformError = function() {
      return new e(E.unableToAcquireTokenFromNativePlatform.code, E.unableToAcquireTokenFromNativePlatform.desc);
    }, e.createNativeHandshakeTimeoutError = function() {
      return new e(E.nativeHandshakeTimeout.code, E.nativeHandshakeTimeout.desc);
    }, e.createNativeExtensionNotInstalledError = function() {
      return new e(E.nativeExtensionNotInstalled.code, E.nativeExtensionNotInstalled.desc);
    }, e.createNativeConnectionNotEstablishedError = function() {
      return new e(E.nativeConnectionNotEstablished.code, E.nativeConnectionNotEstablished.desc);
    }, e.createNativeBrokerCalledBeforeInitialize = function() {
      return new e(E.nativeBrokerCalledBeforeInitialize.code, E.nativeBrokerCalledBeforeInitialize.desc);
    }, e.createNativePromptParameterNotSupportedError = function() {
      return new e(E.nativePromptNotSupported.code, E.nativePromptNotSupported.desc);
    }, e;
  }(k)
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var ve = {
  /**
   * Interaction in progress cache value
   */
  INTERACTION_IN_PROGRESS_VALUE: "interaction_in_progress",
  /**
   * Invalid grant error code
   */
  INVALID_GRANT_ERROR: "invalid_grant",
  /**
   * Default popup window width
   */
  POPUP_WIDTH: 483,
  /**
   * Default popup window height
   */
  POPUP_HEIGHT: 600,
  /**
   * Name of the popup window starts with
   */
  POPUP_NAME_PREFIX: "msal",
  /**
   * Default popup monitor poll interval in milliseconds
   */
  DEFAULT_POLL_INTERVAL_MS: 30,
  /**
   * Msal-browser SKU
   */
  MSAL_SKU: "msal.js.browser"
}, rt = {
  CHANNEL_ID: "53ee284d-920a-4b59-9d30-a60315b26836",
  PREFERRED_EXTENSION_ID: "ppnbnpeolgkicgegkbkbjmhlideopiji",
  MATS_TELEMETRY: "MATS"
}, ke;
(function(n) {
  n.HandshakeRequest = "Handshake", n.HandshakeResponse = "HandshakeResponse", n.GetToken = "GetToken", n.Response = "Response";
})(ke || (ke = {}));
var Q;
(function(n) {
  n.LocalStorage = "localStorage", n.SessionStorage = "sessionStorage", n.MemoryStorage = "memoryStorage";
})(Q || (Q = {}));
var Te;
(function(n) {
  n.GET = "GET", n.POST = "POST";
})(Te || (Te = {}));
var x;
(function(n) {
  n.AUTHORITY = "authority", n.ACQUIRE_TOKEN_ACCOUNT = "acquireToken.account", n.SESSION_STATE = "session.state", n.REQUEST_STATE = "request.state", n.NONCE_IDTOKEN = "nonce.id_token", n.ORIGIN_URI = "request.origin", n.RENEW_STATUS = "token.renew.status", n.URL_HASH = "urlHash", n.REQUEST_PARAMS = "request.params", n.SCOPES = "scopes", n.INTERACTION_STATUS_KEY = "interaction.status", n.CCS_CREDENTIAL = "ccs.credential", n.CORRELATION_ID = "request.correlationId", n.NATIVE_REQUEST = "request.native", n.REDIRECT_CONTEXT = "request.redirect.context";
})(x || (x = {}));
var _e;
(function(n) {
  n.ACCOUNT_KEYS = "msal.account.keys", n.TOKEN_KEYS = "msal.token.keys";
})(_e || (_e = {}));
var Ve;
(function(n) {
  n.WRAPPER_SKU = "wrapper.sku", n.WRAPPER_VER = "wrapper.version";
})(Ve || (Ve = {}));
var q;
(function(n) {
  n[n.acquireTokenRedirect = 861] = "acquireTokenRedirect", n[n.acquireTokenPopup = 862] = "acquireTokenPopup", n[n.ssoSilent = 863] = "ssoSilent", n[n.acquireTokenSilent_authCode = 864] = "acquireTokenSilent_authCode", n[n.handleRedirectPromise = 865] = "handleRedirectPromise", n[n.acquireTokenByCode = 866] = "acquireTokenByCode", n[n.acquireTokenSilent_silentFlow = 61] = "acquireTokenSilent_silentFlow", n[n.logout = 961] = "logout", n[n.logoutPopup = 962] = "logoutPopup";
})(q || (q = {}));
var S;
(function(n) {
  n.Redirect = "redirect", n.Popup = "popup", n.Silent = "silent", n.None = "none";
})(S || (S = {}));
var mr;
(function(n) {
  n.Startup = "startup", n.Login = "login", n.Logout = "logout", n.AcquireToken = "acquireToken", n.SsoSilent = "ssoSilent", n.HandleRedirect = "handleRedirect", n.None = "none";
})(mr || (mr = {}));
var vr = {
  scopes: pt
}, $e = "jwk", yr;
(function(n) {
  n.React = "@azure/msal-react", n.Angular = "@azure/msal-angular";
})(yr || (yr = {}));
var Gt = "msal.db", An = 1, kn = Gt + ".keys", ce;
(function(n) {
  n[n.Default = 0] = "Default", n[n.AccessToken = 1] = "AccessToken", n[n.AccessTokenAndRefreshToken = 2] = "AccessTokenAndRefreshToken", n[n.RefreshToken = 3] = "RefreshToken", n[n.RefreshTokenAndNetwork = 4] = "RefreshTokenAndNetwork", n[n.Skip = 5] = "Skip";
})(ce || (ce = {}));
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var ie = {
  redirectUriNotSet: {
    code: "redirect_uri_empty",
    desc: "A redirect URI is required for all calls, and none has been set."
  },
  postLogoutUriNotSet: {
    code: "post_logout_uri_empty",
    desc: "A post logout redirect has not been set."
  },
  storageNotSupportedError: {
    code: "storage_not_supported",
    desc: "Given storage configuration option was not supported."
  },
  noRedirectCallbacksSet: {
    code: "no_redirect_callbacks",
    desc: "No redirect callbacks have been set. Please call setRedirectCallbacks() with the appropriate function arguments before continuing. More information is available here: https://github.com/AzureAD/microsoft-authentication-library-for-js/wiki/MSAL-basics."
  },
  invalidCallbackObject: {
    code: "invalid_callback_object",
    desc: "The object passed for the callback was invalid. More information is available here: https://github.com/AzureAD/microsoft-authentication-library-for-js/wiki/MSAL-basics."
  },
  stubPcaInstanceCalled: {
    code: "stubbed_public_client_application_called",
    desc: "Stub instance of Public Client Application was called. If using msal-react, please ensure context is not used without a provider. For more visit: aka.ms/msaljs/browser-errors"
  },
  inMemRedirectUnavailable: {
    code: "in_mem_redirect_unavailable",
    desc: "Redirect cannot be supported. In-memory storage was selected and storeAuthStateInCookie=false, which would cause the library to be unable to handle the incoming hash. If you would like to use the redirect API, please use session/localStorage or set storeAuthStateInCookie=true."
  },
  entropyNotProvided: {
    code: "entropy_not_provided",
    desc: "The available browser crypto interface requires entropy set via system.cryptoOptions.entropy configuration option."
  }
}, Mt = (
  /** @class */
  function(n) {
    X(e, n);
    function e(t, r) {
      var o = n.call(this, t, r) || this;
      return o.name = "BrowserConfigurationAuthError", Object.setPrototypeOf(o, e.prototype), o;
    }
    return e.createRedirectUriEmptyError = function() {
      return new e(ie.redirectUriNotSet.code, ie.redirectUriNotSet.desc);
    }, e.createPostLogoutRedirectUriEmptyError = function() {
      return new e(ie.postLogoutUriNotSet.code, ie.postLogoutUriNotSet.desc);
    }, e.createStorageNotSupportedError = function(t) {
      return new e(ie.storageNotSupportedError.code, ie.storageNotSupportedError.desc + " Given Location: " + t);
    }, e.createRedirectCallbacksNotSetError = function() {
      return new e(ie.noRedirectCallbacksSet.code, ie.noRedirectCallbacksSet.desc);
    }, e.createStubPcaInstanceCalledError = function() {
      return new e(ie.stubPcaInstanceCalled.code, ie.stubPcaInstanceCalled.desc);
    }, e.createInMemoryRedirectUnavailableError = function() {
      return new e(ie.inMemRedirectUnavailable.code, ie.inMemRedirectUnavailable.desc);
    }, e.createEntropyNotProvided = function() {
      return new e(ie.entropyNotProvided.code, ie.entropyNotProvided.desc);
    }, e;
  }(k)
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Cr = (
  /** @class */
  function() {
    function n(e) {
      this.validateWindowStorage(e), this.windowStorage = window[e];
    }
    return n.prototype.validateWindowStorage = function(e) {
      if (e !== Q.LocalStorage && e !== Q.SessionStorage)
        throw Mt.createStorageNotSupportedError(e);
      var t = !!window[e];
      if (!t)
        throw Mt.createStorageNotSupportedError(e);
    }, n.prototype.getItem = function(e) {
      return this.windowStorage.getItem(e);
    }, n.prototype.setItem = function(e, t) {
      this.windowStorage.setItem(e, t);
    }, n.prototype.removeItem = function(e) {
      this.windowStorage.removeItem(e);
    }, n.prototype.getKeys = function() {
      return Object.keys(this.windowStorage);
    }, n.prototype.containsKey = function(e) {
      return this.windowStorage.hasOwnProperty(e);
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var zt = (
  /** @class */
  function() {
    function n() {
      this.cache = /* @__PURE__ */ new Map();
    }
    return n.prototype.getItem = function(e) {
      return this.cache.get(e) || null;
    }, n.prototype.setItem = function(e, t) {
      this.cache.set(e, t);
    }, n.prototype.removeItem = function(e) {
      this.cache.delete(e);
    }, n.prototype.getKeys = function() {
      var e = [];
      return this.cache.forEach(function(t, r) {
        e.push(r);
      }), e;
    }, n.prototype.containsKey = function(e) {
      return this.cache.has(e);
    }, n.prototype.clear = function() {
      this.cache.clear();
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var qr = (
  /** @class */
  function() {
    function n() {
    }
    return n.extractBrowserRequestState = function(e, t) {
      if (I.isEmpty(t))
        return null;
      try {
        var r = be.parseRequestState(e, t);
        return r.libraryState.meta;
      } catch (o) {
        throw w.createInvalidStateError(t, o);
      }
    }, n.parseServerResponseFromHash = function(e) {
      if (!e)
        return {};
      var t = new F(e);
      return F.getDeserializedHash(t.getHash());
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Yt = (
  /** @class */
  function(n) {
    X(e, n);
    function e(t, r, o, i) {
      var a = n.call(this, t, o, i) || this;
      return a.COOKIE_LIFE_MULTIPLIER = 24 * 60 * 60 * 1e3, a.cacheConfig = r, a.logger = i, a.internalStorage = new zt(), a.browserStorage = a.setupBrowserStorage(a.cacheConfig.cacheLocation), a.temporaryCacheStorage = a.setupTemporaryCacheStorage(a.cacheConfig.temporaryCacheLocation, a.cacheConfig.cacheLocation), r.cacheMigrationEnabled && (a.migrateCacheEntries(), a.createKeyMaps()), a;
    }
    return e.prototype.setupBrowserStorage = function(t) {
      switch (t) {
        case Q.LocalStorage:
        case Q.SessionStorage:
          try {
            return new Cr(t);
          } catch (r) {
            this.logger.verbose(r);
            break;
          }
      }
      return this.cacheConfig.cacheLocation = Q.MemoryStorage, new zt();
    }, e.prototype.setupTemporaryCacheStorage = function(t, r) {
      switch (r) {
        case Q.LocalStorage:
        case Q.SessionStorage:
          try {
            return new Cr(t || Q.SessionStorage);
          } catch (o) {
            return this.logger.verbose(o), this.internalStorage;
          }
        case Q.MemoryStorage:
        default:
          return this.internalStorage;
      }
    }, e.prototype.migrateCacheEntries = function() {
      var t = this, r = h.CACHE_PREFIX + "." + j.ID_TOKEN, o = h.CACHE_PREFIX + "." + j.CLIENT_INFO, i = h.CACHE_PREFIX + "." + j.ERROR, a = h.CACHE_PREFIX + "." + j.ERROR_DESC, s = this.browserStorage.getItem(r), c = this.browserStorage.getItem(o), u = this.browserStorage.getItem(i), l = this.browserStorage.getItem(a), d = [s, c, u, l], p = [j.ID_TOKEN, j.CLIENT_INFO, j.ERROR, j.ERROR_DESC];
      p.forEach(function(f, m) {
        return t.migrateCacheEntry(f, d[m]);
      });
    }, e.prototype.migrateCacheEntry = function(t, r) {
      r && this.setTemporaryCache(t, r, !0);
    }, e.prototype.createKeyMaps = function() {
      var t = this;
      this.logger.trace("BrowserCacheManager - createKeyMaps called.");
      var r = this.getItem(_e.ACCOUNT_KEYS), o = this.getItem(_e.TOKEN_KEYS + "." + this.clientId);
      if (r && o) {
        this.logger.verbose("BrowserCacheManager:createKeyMaps - account and token key maps already exist, skipping migration.");
        return;
      }
      var i = this.browserStorage.getKeys();
      i.forEach(function(a) {
        if (t.isCredentialKey(a)) {
          var s = t.getItem(a);
          if (s) {
            var c = t.validateAndParseJson(s);
            if (c && c.hasOwnProperty("credentialType"))
              switch (c.credentialType) {
                case M.ID_TOKEN:
                  if (Fe.isIdTokenEntity(c)) {
                    t.logger.trace("BrowserCacheManager:createKeyMaps - idToken found, saving key to token key map"), t.logger.tracePii("BrowserCacheManager:createKeyMaps - idToken with key: " + a + " found, saving key to token key map");
                    var u = ae.toObject(new Fe(), c), l = t.updateCredentialCacheKey(a, u);
                    t.addTokenKey(l, M.ID_TOKEN);
                    return;
                  } else
                    t.logger.trace("BrowserCacheManager:createKeyMaps - key found matching idToken schema with value containing idToken credentialType field but value failed IdTokenEntity validation, skipping."), t.logger.tracePii("BrowserCacheManager:createKeyMaps - failed idToken validation on key: " + a);
                  break;
                case M.ACCESS_TOKEN:
                case M.ACCESS_TOKEN_WITH_AUTH_SCHEME:
                  if (xe.isAccessTokenEntity(c)) {
                    t.logger.trace("BrowserCacheManager:createKeyMaps - accessToken found, saving key to token key map"), t.logger.tracePii("BrowserCacheManager:createKeyMaps - accessToken with key: " + a + " found, saving key to token key map");
                    var d = ae.toObject(new xe(), c), l = t.updateCredentialCacheKey(a, d);
                    t.addTokenKey(l, M.ACCESS_TOKEN);
                    return;
                  } else
                    t.logger.trace("BrowserCacheManager:createKeyMaps - key found matching accessToken schema with value containing accessToken credentialType field but value failed AccessTokenEntity validation, skipping."), t.logger.tracePii("BrowserCacheManager:createKeyMaps - failed accessToken validation on key: " + a);
                  break;
                case M.REFRESH_TOKEN:
                  if (je.isRefreshTokenEntity(c)) {
                    t.logger.trace("BrowserCacheManager:createKeyMaps - refreshToken found, saving key to token key map"), t.logger.tracePii("BrowserCacheManager:createKeyMaps - refreshToken with key: " + a + " found, saving key to token key map");
                    var p = ae.toObject(new je(), c), l = t.updateCredentialCacheKey(a, p);
                    t.addTokenKey(l, M.REFRESH_TOKEN);
                    return;
                  } else
                    t.logger.trace("BrowserCacheManager:createKeyMaps - key found matching refreshToken schema with value containing refreshToken credentialType field but value failed RefreshTokenEntity validation, skipping."), t.logger.tracePii("BrowserCacheManager:createKeyMaps - failed refreshToken validation on key: " + a);
                  break;
              }
          }
        }
        if (t.isAccountKey(a)) {
          var s = t.getItem(a);
          if (s) {
            var f = t.validateAndParseJson(s);
            f && J.isAccountEntity(f) && (t.logger.trace("BrowserCacheManager:createKeyMaps - account found, saving key to account key map"), t.logger.tracePii("BrowserCacheManager:createKeyMaps - account with key: " + a + " found, saving key to account key map"), t.addAccountKeyToMap(a));
          }
        }
      });
    }, e.prototype.validateAndParseJson = function(t) {
      try {
        var r = JSON.parse(t);
        return r && typeof r == "object" ? r : null;
      } catch {
        return null;
      }
    }, e.prototype.getItem = function(t) {
      return this.browserStorage.getItem(t);
    }, e.prototype.setItem = function(t, r) {
      this.browserStorage.setItem(t, r);
    }, e.prototype.getAccount = function(t) {
      this.logger.trace("BrowserCacheManager.getAccount called");
      var r = this.getItem(t);
      if (!r)
        return this.removeAccountKeyFromMap(t), null;
      var o = this.validateAndParseJson(r);
      return !o || !J.isAccountEntity(o) ? (this.removeAccountKeyFromMap(t), null) : ae.toObject(new J(), o);
    }, e.prototype.setAccount = function(t) {
      this.logger.trace("BrowserCacheManager.setAccount called");
      var r = t.generateAccountKey();
      this.setItem(r, JSON.stringify(t)), this.addAccountKeyToMap(r);
    }, e.prototype.getAccountKeys = function() {
      this.logger.trace("BrowserCacheManager.getAccountKeys called");
      var t = this.getItem(_e.ACCOUNT_KEYS);
      return t ? JSON.parse(t) : (this.logger.verbose("BrowserCacheManager.getAccountKeys - No account keys found"), []);
    }, e.prototype.addAccountKeyToMap = function(t) {
      this.logger.trace("BrowserCacheManager.addAccountKeyToMap called"), this.logger.tracePii("BrowserCacheManager.addAccountKeyToMap called with key: " + t);
      var r = this.getAccountKeys();
      r.indexOf(t) === -1 ? (r.push(t), this.setItem(_e.ACCOUNT_KEYS, JSON.stringify(r)), this.logger.verbose("BrowserCacheManager.addAccountKeyToMap account key added")) : this.logger.verbose("BrowserCacheManager.addAccountKeyToMap account key already exists in map");
    }, e.prototype.removeAccountKeyFromMap = function(t) {
      this.logger.trace("BrowserCacheManager.removeAccountKeyFromMap called"), this.logger.tracePii("BrowserCacheManager.removeAccountKeyFromMap called with key: " + t);
      var r = this.getAccountKeys(), o = r.indexOf(t);
      o > -1 ? (r.splice(o, 1), this.setItem(_e.ACCOUNT_KEYS, JSON.stringify(r)), this.logger.trace("BrowserCacheManager.removeAccountKeyFromMap account key removed")) : this.logger.trace("BrowserCacheManager.removeAccountKeyFromMap key not found in existing map");
    }, e.prototype.removeAccount = function(t) {
      return v(this, void 0, void 0, function() {
        return y(this, function(r) {
          return n.prototype.removeAccount.call(this, t), this.removeAccountKeyFromMap(t), [
            2
            /*return*/
          ];
        });
      });
    }, e.prototype.removeIdToken = function(t) {
      n.prototype.removeIdToken.call(this, t), this.removeTokenKey(t, M.ID_TOKEN);
    }, e.prototype.removeAccessToken = function(t) {
      return v(this, void 0, void 0, function() {
        return y(this, function(r) {
          return n.prototype.removeAccessToken.call(this, t), this.removeTokenKey(t, M.ACCESS_TOKEN), [
            2
            /*return*/
          ];
        });
      });
    }, e.prototype.removeRefreshToken = function(t) {
      n.prototype.removeRefreshToken.call(this, t), this.removeTokenKey(t, M.REFRESH_TOKEN);
    }, e.prototype.getTokenKeys = function() {
      this.logger.trace("BrowserCacheManager.getTokenKeys called");
      var t = this.getItem(_e.TOKEN_KEYS + "." + this.clientId);
      if (t) {
        var r = this.validateAndParseJson(t);
        if (r && r.hasOwnProperty("idToken") && r.hasOwnProperty("accessToken") && r.hasOwnProperty("refreshToken"))
          return r;
        this.logger.error("BrowserCacheManager.getTokenKeys - Token keys found but in an unknown format. Returning empty key map.");
      } else
        this.logger.verbose("BrowserCacheManager.getTokenKeys - No token keys found");
      return {
        idToken: [],
        accessToken: [],
        refreshToken: []
      };
    }, e.prototype.addTokenKey = function(t, r) {
      this.logger.trace("BrowserCacheManager addTokenKey called");
      var o = this.getTokenKeys();
      switch (r) {
        case M.ID_TOKEN:
          o.idToken.indexOf(t) === -1 && (this.logger.info("BrowserCacheManager: addTokenKey - idToken added to map"), o.idToken.push(t));
          break;
        case M.ACCESS_TOKEN:
          o.accessToken.indexOf(t) === -1 && (this.logger.info("BrowserCacheManager: addTokenKey - accessToken added to map"), o.accessToken.push(t));
          break;
        case M.REFRESH_TOKEN:
          o.refreshToken.indexOf(t) === -1 && (this.logger.info("BrowserCacheManager: addTokenKey - refreshToken added to map"), o.refreshToken.push(t));
          break;
        default:
          this.logger.error("BrowserCacheManager:addTokenKey - CredentialType provided invalid. CredentialType: " + r), w.createUnexpectedCredentialTypeError();
      }
      this.setItem(_e.TOKEN_KEYS + "." + this.clientId, JSON.stringify(o));
    }, e.prototype.removeTokenKey = function(t, r) {
      this.logger.trace("BrowserCacheManager removeTokenKey called");
      var o = this.getTokenKeys();
      switch (r) {
        case M.ID_TOKEN:
          this.logger.infoPii("BrowserCacheManager: removeTokenKey - attempting to remove idToken with key: " + t + " from map");
          var i = o.idToken.indexOf(t);
          i > -1 ? (this.logger.info("BrowserCacheManager: removeTokenKey - idToken removed from map"), o.idToken.splice(i, 1)) : this.logger.info("BrowserCacheManager: removeTokenKey - idToken does not exist in map. Either it was previously removed or it was never added.");
          break;
        case M.ACCESS_TOKEN:
          this.logger.infoPii("BrowserCacheManager: removeTokenKey - attempting to remove accessToken with key: " + t + " from map");
          var a = o.accessToken.indexOf(t);
          a > -1 ? (this.logger.info("BrowserCacheManager: removeTokenKey - accessToken removed from map"), o.accessToken.splice(a, 1)) : this.logger.info("BrowserCacheManager: removeTokenKey - accessToken does not exist in map. Either it was previously removed or it was never added.");
          break;
        case M.REFRESH_TOKEN:
          this.logger.infoPii("BrowserCacheManager: removeTokenKey - attempting to remove refreshToken with key: " + t + " from map");
          var s = o.refreshToken.indexOf(t);
          s > -1 ? (this.logger.info("BrowserCacheManager: removeTokenKey - refreshToken removed from map"), o.refreshToken.splice(s, 1)) : this.logger.info("BrowserCacheManager: removeTokenKey - refreshToken does not exist in map. Either it was previously removed or it was never added.");
          break;
        default:
          this.logger.error("BrowserCacheManager:removeTokenKey - CredentialType provided invalid. CredentialType: " + r), w.createUnexpectedCredentialTypeError();
      }
      this.setItem(_e.TOKEN_KEYS + "." + this.clientId, JSON.stringify(o));
    }, e.prototype.getIdTokenCredential = function(t) {
      var r = this.getItem(t);
      if (!r)
        return this.logger.trace("BrowserCacheManager.getIdTokenCredential: called, no cache hit"), this.removeTokenKey(t, M.ID_TOKEN), null;
      var o = this.validateAndParseJson(r);
      return !o || !Fe.isIdTokenEntity(o) ? (this.logger.trace("BrowserCacheManager.getIdTokenCredential: called, no cache hit"), this.removeTokenKey(t, M.ID_TOKEN), null) : (this.logger.trace("BrowserCacheManager.getIdTokenCredential: cache hit"), ae.toObject(new Fe(), o));
    }, e.prototype.setIdTokenCredential = function(t) {
      this.logger.trace("BrowserCacheManager.setIdTokenCredential called");
      var r = t.generateCredentialKey();
      this.setItem(r, JSON.stringify(t)), this.addTokenKey(r, M.ID_TOKEN);
    }, e.prototype.getAccessTokenCredential = function(t) {
      var r = this.getItem(t);
      if (!r)
        return this.logger.trace("BrowserCacheManager.getAccessTokenCredential: called, no cache hit"), this.removeTokenKey(t, M.ACCESS_TOKEN), null;
      var o = this.validateAndParseJson(r);
      return !o || !xe.isAccessTokenEntity(o) ? (this.logger.trace("BrowserCacheManager.getAccessTokenCredential: called, no cache hit"), this.removeTokenKey(t, M.ACCESS_TOKEN), null) : (this.logger.trace("BrowserCacheManager.getAccessTokenCredential: cache hit"), ae.toObject(new xe(), o));
    }, e.prototype.setAccessTokenCredential = function(t) {
      this.logger.trace("BrowserCacheManager.setAccessTokenCredential called");
      var r = t.generateCredentialKey();
      this.setItem(r, JSON.stringify(t)), this.addTokenKey(r, M.ACCESS_TOKEN);
    }, e.prototype.getRefreshTokenCredential = function(t) {
      var r = this.getItem(t);
      if (!r)
        return this.logger.trace("BrowserCacheManager.getRefreshTokenCredential: called, no cache hit"), this.removeTokenKey(t, M.REFRESH_TOKEN), null;
      var o = this.validateAndParseJson(r);
      return !o || !je.isRefreshTokenEntity(o) ? (this.logger.trace("BrowserCacheManager.getRefreshTokenCredential: called, no cache hit"), this.removeTokenKey(t, M.REFRESH_TOKEN), null) : (this.logger.trace("BrowserCacheManager.getRefreshTokenCredential: cache hit"), ae.toObject(new je(), o));
    }, e.prototype.setRefreshTokenCredential = function(t) {
      this.logger.trace("BrowserCacheManager.setRefreshTokenCredential called");
      var r = t.generateCredentialKey();
      this.setItem(r, JSON.stringify(t)), this.addTokenKey(r, M.REFRESH_TOKEN);
    }, e.prototype.getAppMetadata = function(t) {
      var r = this.getItem(t);
      if (!r)
        return this.logger.trace("BrowserCacheManager.getAppMetadata: called, no cache hit"), null;
      var o = this.validateAndParseJson(r);
      return !o || !Bt.isAppMetadataEntity(t, o) ? (this.logger.trace("BrowserCacheManager.getAppMetadata: called, no cache hit"), null) : (this.logger.trace("BrowserCacheManager.getAppMetadata: cache hit"), ae.toObject(new Bt(), o));
    }, e.prototype.setAppMetadata = function(t) {
      this.logger.trace("BrowserCacheManager.setAppMetadata called");
      var r = t.generateAppMetadataKey();
      this.setItem(r, JSON.stringify(t));
    }, e.prototype.getServerTelemetry = function(t) {
      var r = this.getItem(t);
      if (!r)
        return this.logger.trace("BrowserCacheManager.getServerTelemetry: called, no cache hit"), null;
      var o = this.validateAndParseJson(r);
      return !o || !Nt.isServerTelemetryEntity(t, o) ? (this.logger.trace("BrowserCacheManager.getServerTelemetry: called, no cache hit"), null) : (this.logger.trace("BrowserCacheManager.getServerTelemetry: cache hit"), ae.toObject(new Nt(), o));
    }, e.prototype.setServerTelemetry = function(t, r) {
      this.logger.trace("BrowserCacheManager.setServerTelemetry called"), this.setItem(t, JSON.stringify(r));
    }, e.prototype.getAuthorityMetadata = function(t) {
      var r = this.internalStorage.getItem(t);
      if (!r)
        return this.logger.trace("BrowserCacheManager.getAuthorityMetadata: called, no cache hit"), null;
      var o = this.validateAndParseJson(r);
      return o && qt.isAuthorityMetadataEntity(t, o) ? (this.logger.trace("BrowserCacheManager.getAuthorityMetadata: cache hit"), ae.toObject(new qt(), o)) : null;
    }, e.prototype.getAuthorityMetadataKeys = function() {
      var t = this, r = this.internalStorage.getKeys();
      return r.filter(function(o) {
        return t.isAuthorityMetadata(o);
      });
    }, e.prototype.setWrapperMetadata = function(t, r) {
      this.internalStorage.setItem(Ve.WRAPPER_SKU, t), this.internalStorage.setItem(Ve.WRAPPER_VER, r);
    }, e.prototype.getWrapperMetadata = function() {
      var t = this.internalStorage.getItem(Ve.WRAPPER_SKU) || h.EMPTY_STRING, r = this.internalStorage.getItem(Ve.WRAPPER_VER) || h.EMPTY_STRING;
      return [t, r];
    }, e.prototype.setAuthorityMetadata = function(t, r) {
      this.logger.trace("BrowserCacheManager.setAuthorityMetadata called"), this.internalStorage.setItem(t, JSON.stringify(r));
    }, e.prototype.getActiveAccount = function() {
      var t = this.generateCacheKey(j.ACTIVE_ACCOUNT_FILTERS), r = this.getItem(t);
      if (!r) {
        this.logger.trace("BrowserCacheManager.getActiveAccount: No active account filters cache schema found, looking for legacy schema");
        var o = this.generateCacheKey(j.ACTIVE_ACCOUNT), i = this.getItem(o);
        if (!i)
          return this.logger.trace("BrowserCacheManager.getActiveAccount: No active account found"), null;
        var a = this.getAccountInfoByFilter({ localAccountId: i })[0] || null;
        return a ? (this.logger.trace("BrowserCacheManager.getActiveAccount: Legacy active account cache schema found"), this.logger.trace("BrowserCacheManager.getActiveAccount: Adding active account filters cache schema"), this.setActiveAccount(a), a) : null;
      }
      var s = this.validateAndParseJson(r);
      return s ? (this.logger.trace("BrowserCacheManager.getActiveAccount: Active account filters schema found"), this.getAccountInfoByFilter({
        homeAccountId: s.homeAccountId,
        localAccountId: s.localAccountId
      })[0] || null) : (this.logger.trace("BrowserCacheManager.getActiveAccount: No active account found"), null);
    }, e.prototype.setActiveAccount = function(t) {
      var r = this.generateCacheKey(j.ACTIVE_ACCOUNT_FILTERS), o = this.generateCacheKey(j.ACTIVE_ACCOUNT);
      if (t) {
        this.logger.verbose("setActiveAccount: Active account set");
        var i = {
          homeAccountId: t.homeAccountId,
          localAccountId: t.localAccountId
        };
        this.browserStorage.setItem(r, JSON.stringify(i)), this.browserStorage.setItem(o, t.localAccountId);
      } else
        this.logger.verbose("setActiveAccount: No account passed, active account not set"), this.browserStorage.removeItem(r), this.browserStorage.removeItem(o);
    }, e.prototype.getAccountInfoByFilter = function(t) {
      var r = this.getAllAccounts();
      return this.logger.trace("BrowserCacheManager.getAccountInfoByFilter: total " + r.length + " accounts found"), r.filter(function(o) {
        return !(t.username && t.username.toLowerCase() !== o.username.toLowerCase() || t.homeAccountId && t.homeAccountId !== o.homeAccountId || t.localAccountId && t.localAccountId !== o.localAccountId || t.tenantId && t.tenantId !== o.tenantId || t.environment && t.environment !== o.environment);
      });
    }, e.prototype.getAccountInfoByHints = function(t, r) {
      var o = this.getAllAccounts().filter(function(i) {
        if (r) {
          var a = i.idTokenClaims && i.idTokenClaims.sid;
          return r === a;
        }
        return t ? t === i.username : !1;
      });
      if (o.length === 1)
        return o[0];
      if (o.length > 1)
        throw w.createMultipleMatchingAccountsInCacheError();
      return null;
    }, e.prototype.getThrottlingCache = function(t) {
      var r = this.getItem(t);
      if (!r)
        return this.logger.trace("BrowserCacheManager.getThrottlingCache: called, no cache hit"), null;
      var o = this.validateAndParseJson(r);
      return !o || !pr.isThrottlingEntity(t, o) ? (this.logger.trace("BrowserCacheManager.getThrottlingCache: called, no cache hit"), null) : (this.logger.trace("BrowserCacheManager.getThrottlingCache: cache hit"), ae.toObject(new pr(), o));
    }, e.prototype.setThrottlingCache = function(t, r) {
      this.logger.trace("BrowserCacheManager.setThrottlingCache called"), this.setItem(t, JSON.stringify(r));
    }, e.prototype.getTemporaryCache = function(t, r) {
      var o = r ? this.generateCacheKey(t) : t;
      if (this.cacheConfig.storeAuthStateInCookie) {
        var i = this.getItemCookie(o);
        if (i)
          return this.logger.trace("BrowserCacheManager.getTemporaryCache: storeAuthStateInCookies set to true, retrieving from cookies"), i;
      }
      var a = this.temporaryCacheStorage.getItem(o);
      if (!a) {
        if (this.cacheConfig.cacheLocation === Q.LocalStorage) {
          var s = this.browserStorage.getItem(o);
          if (s)
            return this.logger.trace("BrowserCacheManager.getTemporaryCache: Temporary cache item found in local storage"), s;
        }
        return this.logger.trace("BrowserCacheManager.getTemporaryCache: No cache item found in local storage"), null;
      }
      return this.logger.trace("BrowserCacheManager.getTemporaryCache: Temporary cache item returned"), a;
    }, e.prototype.setTemporaryCache = function(t, r, o) {
      var i = o ? this.generateCacheKey(t) : t;
      this.temporaryCacheStorage.setItem(i, r), this.cacheConfig.storeAuthStateInCookie && (this.logger.trace("BrowserCacheManager.setTemporaryCache: storeAuthStateInCookie set to true, setting item cookie"), this.setItemCookie(i, r));
    }, e.prototype.removeItem = function(t) {
      this.browserStorage.removeItem(t), this.temporaryCacheStorage.removeItem(t), this.cacheConfig.storeAuthStateInCookie && (this.logger.trace("BrowserCacheManager.removeItem: storeAuthStateInCookie is true, clearing item cookie"), this.clearItemCookie(t));
    }, e.prototype.containsKey = function(t) {
      return this.browserStorage.containsKey(t) || this.temporaryCacheStorage.containsKey(t);
    }, e.prototype.getKeys = function() {
      return Jt(this.browserStorage.getKeys(), this.temporaryCacheStorage.getKeys());
    }, e.prototype.clear = function() {
      return v(this, void 0, void 0, function() {
        var t = this;
        return y(this, function(r) {
          switch (r.label) {
            case 0:
              return [4, this.removeAllAccounts()];
            case 1:
              return r.sent(), this.removeAppMetadata(), this.getKeys().forEach(function(o) {
                (t.browserStorage.containsKey(o) || t.temporaryCacheStorage.containsKey(o)) && (o.indexOf(h.CACHE_PREFIX) !== -1 || o.indexOf(t.clientId) !== -1) && t.removeItem(o);
              }), this.internalStorage.clear(), [
                2
                /*return*/
              ];
          }
        });
      });
    }, e.prototype.setItemCookie = function(t, r, o) {
      var i = encodeURIComponent(t) + "=" + encodeURIComponent(r) + ";path=/;SameSite=Lax;";
      if (o) {
        var a = this.getCookieExpirationTime(o);
        i += "expires=" + a + ";";
      }
      this.cacheConfig.secureCookies && (i += "Secure;"), document.cookie = i;
    }, e.prototype.getItemCookie = function(t) {
      for (var r = encodeURIComponent(t) + "=", o = document.cookie.split(";"), i = 0; i < o.length; i++) {
        for (var a = o[i]; a.charAt(0) === " "; )
          a = a.substring(1);
        if (a.indexOf(r) === 0)
          return decodeURIComponent(a.substring(r.length, a.length));
      }
      return h.EMPTY_STRING;
    }, e.prototype.clearMsalCookies = function() {
      var t = this, r = h.CACHE_PREFIX + "." + this.clientId, o = document.cookie.split(";");
      o.forEach(function(i) {
        for (; i.charAt(0) === " "; )
          i = i.substring(1);
        if (i.indexOf(r) === 0) {
          var a = i.split("=")[0];
          t.clearItemCookie(a);
        }
      });
    }, e.prototype.clearItemCookie = function(t) {
      this.setItemCookie(t, h.EMPTY_STRING, -1);
    }, e.prototype.getCookieExpirationTime = function(t) {
      var r = /* @__PURE__ */ new Date(), o = new Date(r.getTime() + t * this.COOKIE_LIFE_MULTIPLIER);
      return o.toUTCString();
    }, e.prototype.getCache = function() {
      return this.browserStorage;
    }, e.prototype.setCache = function() {
    }, e.prototype.generateCacheKey = function(t) {
      var r = this.validateAndParseJson(t);
      return r ? JSON.stringify(t) : I.startsWith(t, h.CACHE_PREFIX) || I.startsWith(t, j.ADAL_ID_TOKEN) ? t : h.CACHE_PREFIX + "." + this.clientId + "." + t;
    }, e.prototype.generateAuthorityKey = function(t) {
      var r = be.parseRequestState(this.cryptoImpl, t).libraryState.id;
      return this.generateCacheKey(x.AUTHORITY + "." + r);
    }, e.prototype.generateNonceKey = function(t) {
      var r = be.parseRequestState(this.cryptoImpl, t).libraryState.id;
      return this.generateCacheKey(x.NONCE_IDTOKEN + "." + r);
    }, e.prototype.generateStateKey = function(t) {
      var r = be.parseRequestState(this.cryptoImpl, t).libraryState.id;
      return this.generateCacheKey(x.REQUEST_STATE + "." + r);
    }, e.prototype.getCachedAuthority = function(t) {
      var r = this.generateStateKey(t), o = this.getTemporaryCache(r);
      if (!o)
        return null;
      var i = this.generateAuthorityKey(o);
      return this.getTemporaryCache(i);
    }, e.prototype.updateCacheEntries = function(t, r, o, i, a) {
      this.logger.trace("BrowserCacheManager.updateCacheEntries called");
      var s = this.generateStateKey(t);
      this.setTemporaryCache(s, t, !1);
      var c = this.generateNonceKey(t);
      this.setTemporaryCache(c, r, !1);
      var u = this.generateAuthorityKey(t);
      if (this.setTemporaryCache(u, o, !1), a) {
        var l = {
          credential: a.homeAccountId,
          type: de.HOME_ACCOUNT_ID
        };
        this.setTemporaryCache(x.CCS_CREDENTIAL, JSON.stringify(l), !0);
      } else if (!I.isEmpty(i)) {
        var l = {
          credential: i,
          type: de.UPN
        };
        this.setTemporaryCache(x.CCS_CREDENTIAL, JSON.stringify(l), !0);
      }
    }, e.prototype.resetRequestCache = function(t) {
      var r = this;
      this.logger.trace("BrowserCacheManager.resetRequestCache called"), I.isEmpty(t) || this.getKeys().forEach(function(o) {
        o.indexOf(t) !== -1 && r.removeItem(o);
      }), t && (this.removeItem(this.generateStateKey(t)), this.removeItem(this.generateNonceKey(t)), this.removeItem(this.generateAuthorityKey(t))), this.removeItem(this.generateCacheKey(x.REQUEST_PARAMS)), this.removeItem(this.generateCacheKey(x.ORIGIN_URI)), this.removeItem(this.generateCacheKey(x.URL_HASH)), this.removeItem(this.generateCacheKey(x.CORRELATION_ID)), this.removeItem(this.generateCacheKey(x.CCS_CREDENTIAL)), this.removeItem(this.generateCacheKey(x.NATIVE_REQUEST)), this.setInteractionInProgress(!1);
    }, e.prototype.cleanRequestByState = function(t) {
      if (this.logger.trace("BrowserCacheManager.cleanRequestByState called"), t) {
        var r = this.generateStateKey(t), o = this.temporaryCacheStorage.getItem(r);
        this.logger.infoPii("BrowserCacheManager.cleanRequestByState: Removing temporary cache items for state: " + o), this.resetRequestCache(o || h.EMPTY_STRING);
      }
      this.clearMsalCookies();
    }, e.prototype.cleanRequestByInteractionType = function(t) {
      var r = this;
      this.logger.trace("BrowserCacheManager.cleanRequestByInteractionType called"), this.getKeys().forEach(function(o) {
        if (o.indexOf(x.REQUEST_STATE) !== -1) {
          var i = r.temporaryCacheStorage.getItem(o);
          if (i) {
            var a = qr.extractBrowserRequestState(r.cryptoImpl, i);
            a && a.interactionType === t && (r.logger.infoPii("BrowserCacheManager.cleanRequestByInteractionType: Removing temporary cache items for state: " + i), r.resetRequestCache(i));
          }
        }
      }), this.clearMsalCookies(), this.setInteractionInProgress(!1);
    }, e.prototype.cacheCodeRequest = function(t, r) {
      this.logger.trace("BrowserCacheManager.cacheCodeRequest called");
      var o = r.base64Encode(JSON.stringify(t));
      this.setTemporaryCache(x.REQUEST_PARAMS, o, !0);
    }, e.prototype.getCachedRequest = function(t, r) {
      this.logger.trace("BrowserCacheManager.getCachedRequest called");
      var o = this.getTemporaryCache(x.REQUEST_PARAMS, !0);
      if (!o)
        throw T.createNoTokenRequestCacheError();
      var i = this.validateAndParseJson(r.base64Decode(o));
      if (!i)
        throw T.createUnableToParseTokenRequestCacheError();
      if (this.removeItem(this.generateCacheKey(x.REQUEST_PARAMS)), I.isEmpty(i.authority)) {
        var a = this.generateAuthorityKey(t), s = this.getTemporaryCache(a);
        if (!s)
          throw T.createNoCachedAuthorityError();
        i.authority = s;
      }
      return i;
    }, e.prototype.getCachedNativeRequest = function() {
      this.logger.trace("BrowserCacheManager.getCachedNativeRequest called");
      var t = this.getTemporaryCache(x.NATIVE_REQUEST, !0);
      if (!t)
        return this.logger.trace("BrowserCacheManager.getCachedNativeRequest: No cached native request found"), null;
      var r = this.validateAndParseJson(t);
      return r || (this.logger.error("BrowserCacheManager.getCachedNativeRequest: Unable to parse native request"), null);
    }, e.prototype.isInteractionInProgress = function(t) {
      var r = this.getInteractionInProgress();
      return t ? r === this.clientId : !!r;
    }, e.prototype.getInteractionInProgress = function() {
      var t = h.CACHE_PREFIX + "." + x.INTERACTION_STATUS_KEY;
      return this.getTemporaryCache(t, !1);
    }, e.prototype.setInteractionInProgress = function(t) {
      var r = h.CACHE_PREFIX + "." + x.INTERACTION_STATUS_KEY;
      if (t) {
        if (this.getInteractionInProgress())
          throw T.createInteractionInProgressError();
        this.setTemporaryCache(r, this.clientId, !1);
      } else
        !t && this.getInteractionInProgress() === this.clientId && this.removeItem(r);
    }, e.prototype.getLegacyLoginHint = function() {
      var t = this.getTemporaryCache(j.ADAL_ID_TOKEN);
      t && (this.browserStorage.removeItem(j.ADAL_ID_TOKEN), this.logger.verbose("Cached ADAL id token retrieved."));
      var r = this.getTemporaryCache(j.ID_TOKEN, !0);
      r && (this.removeItem(this.generateCacheKey(j.ID_TOKEN)), this.logger.verbose("Cached MSAL.js v1 id token retrieved"));
      var o = r || t;
      if (o) {
        var i = new we(o, this.cryptoImpl);
        if (i.claims && i.claims.preferred_username)
          return this.logger.verbose("No SSO params used and ADAL/MSAL v1 token retrieved, setting ADAL/MSAL v1 preferred_username as loginHint"), i.claims.preferred_username;
        if (i.claims && i.claims.upn)
          return this.logger.verbose("No SSO params used and ADAL/MSAL v1 token retrieved, setting ADAL/MSAL v1 upn as loginHint"), i.claims.upn;
        this.logger.verbose("No SSO params used and ADAL/MSAL v1 token retrieved, however, no account hint claim found. Enable preferred_username or upn id token claim to get SSO.");
      }
      return null;
    }, e.prototype.updateCredentialCacheKey = function(t, r) {
      var o = r.generateCredentialKey();
      if (t !== o) {
        var i = this.getItem(t);
        if (i)
          return this.removeItem(t), this.setItem(o, i), this.logger.verbose("Updated an outdated " + r.credentialType + " cache key"), o;
        this.logger.error("Attempted to update an outdated " + r.credentialType + " cache key but no item matching the outdated key was found in storage");
      }
      return t;
    }, e.prototype.getRedirectRequestContext = function() {
      return this.getTemporaryCache(x.REDIRECT_CONTEXT, !0);
    }, e.prototype.setRedirectRequestContext = function(t) {
      this.setTemporaryCache(x.REDIRECT_CONTEXT, t, !0);
    }, e;
  }(ae)
), bn = function(n, e) {
  var t = {
    cacheLocation: Q.MemoryStorage,
    temporaryCacheLocation: Q.MemoryStorage,
    storeAuthStateInCookie: !1,
    secureCookies: !1,
    cacheMigrationEnabled: !1
  };
  return new Yt(n, t, It, e);
};
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Ut = "@azure/msal-browser", ct = "2.37.0";
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Rn = (
  /** @class */
  function() {
    function n() {
    }
    return n.prototype.sendGetRequestAsync = function(e, t) {
      return v(this, void 0, void 0, function() {
        var r, o, i;
        return y(this, function(a) {
          switch (a.label) {
            case 0:
              return a.trys.push([0, 2, , 3]), [4, fetch(e, {
                method: Te.GET,
                headers: this.getFetchHeaders(t)
              })];
            case 1:
              return r = a.sent(), [3, 3];
            case 2:
              throw o = a.sent(), window.navigator.onLine ? T.createGetRequestFailedError(o, e) : T.createNoNetworkConnectivityError();
            case 3:
              return a.trys.push([3, 5, , 6]), i = {
                headers: this.getHeaderDict(r.headers)
              }, [4, r.json()];
            case 4:
              return [2, (i.body = a.sent(), i.status = r.status, i)];
            case 5:
              throw a.sent(), T.createFailedToParseNetworkResponseError(e);
            case 6:
              return [
                2
                /*return*/
              ];
          }
        });
      });
    }, n.prototype.sendPostRequestAsync = function(e, t) {
      return v(this, void 0, void 0, function() {
        var r, o, i, a;
        return y(this, function(s) {
          switch (s.label) {
            case 0:
              r = t && t.body || h.EMPTY_STRING, s.label = 1;
            case 1:
              return s.trys.push([1, 3, , 4]), [4, fetch(e, {
                method: Te.POST,
                headers: this.getFetchHeaders(t),
                body: r
              })];
            case 2:
              return o = s.sent(), [3, 4];
            case 3:
              throw i = s.sent(), window.navigator.onLine ? T.createPostRequestFailedError(i, e) : T.createNoNetworkConnectivityError();
            case 4:
              return s.trys.push([4, 6, , 7]), a = {
                headers: this.getHeaderDict(o.headers)
              }, [4, o.json()];
            case 5:
              return [2, (a.body = s.sent(), a.status = o.status, a)];
            case 6:
              throw s.sent(), T.createFailedToParseNetworkResponseError(e);
            case 7:
              return [
                2
                /*return*/
              ];
          }
        });
      });
    }, n.prototype.getFetchHeaders = function(e) {
      var t = new Headers();
      if (!(e && e.headers))
        return t;
      var r = e.headers;
      return Object.keys(r).forEach(function(o) {
        t.append(o, r[o]);
      }), t;
    }, n.prototype.getHeaderDict = function(e) {
      var t = {};
      return e.forEach(function(r, o) {
        t[o] = r;
      }), t;
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Nn = (
  /** @class */
  function() {
    function n() {
    }
    return n.prototype.sendGetRequestAsync = function(e, t) {
      return v(this, void 0, void 0, function() {
        return y(this, function(r) {
          return [2, this.sendRequestAsync(e, Te.GET, t)];
        });
      });
    }, n.prototype.sendPostRequestAsync = function(e, t) {
      return v(this, void 0, void 0, function() {
        return y(this, function(r) {
          return [2, this.sendRequestAsync(e, Te.POST, t)];
        });
      });
    }, n.prototype.sendRequestAsync = function(e, t, r) {
      var o = this;
      return new Promise(function(i, a) {
        var s = new XMLHttpRequest();
        if (s.open(
          t,
          e,
          /* async: */
          !0
        ), o.setXhrHeaders(s, r), s.onload = function() {
          (s.status < 200 || s.status >= 300) && (t === Te.POST ? a(T.createPostRequestFailedError("Failed with status " + s.status, e)) : a(T.createGetRequestFailedError("Failed with status " + s.status, e)));
          try {
            var c = JSON.parse(s.responseText), u = {
              headers: o.getHeaderDict(s),
              body: c,
              status: s.status
            };
            i(u);
          } catch {
            a(T.createFailedToParseNetworkResponseError(e));
          }
        }, s.onerror = function() {
          window.navigator.onLine ? t === Te.POST ? a(T.createPostRequestFailedError("Failed with status " + s.status, e)) : a(T.createGetRequestFailedError("Failed with status " + s.status, e)) : a(T.createNoNetworkConnectivityError());
        }, t === Te.POST && r && r.body)
          s.send(r.body);
        else if (t === Te.GET)
          s.send();
        else
          throw T.createHttpMethodNotImplementedError(t);
      });
    }, n.prototype.setXhrHeaders = function(e, t) {
      if (t && t.headers) {
        var r = t.headers;
        Object.keys(r).forEach(function(o) {
          e.setRequestHeader(o, r[o]);
        });
      }
    }, n.prototype.getHeaderDict = function(e) {
      var t = e.getAllResponseHeaders(), r = t.trim().split(/[\r\n]+/), o = {};
      return r.forEach(function(i) {
        var a = i.split(": "), s = a.shift(), c = a.join(": ");
        s && c && (o[s] = c);
      }), o;
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Y = (
  /** @class */
  function() {
    function n() {
    }
    return n.clearHash = function(e) {
      e.location.hash = h.EMPTY_STRING, typeof e.history.replaceState == "function" && e.history.replaceState(null, h.EMPTY_STRING, "" + e.location.origin + e.location.pathname + e.location.search);
    }, n.replaceHash = function(e) {
      var t = e.split("#");
      t.shift(), window.location.hash = t.length > 0 ? t.join("#") : h.EMPTY_STRING;
    }, n.isInIframe = function() {
      return window.parent !== window;
    }, n.isInPopup = function() {
      return typeof window < "u" && !!window.opener && window.opener !== window && typeof window.name == "string" && window.name.indexOf(ve.POPUP_NAME_PREFIX + ".") === 0;
    }, n.getCurrentUri = function() {
      return window.location.href.split("?")[0].split("#")[0];
    }, n.getHomepage = function() {
      var e = new F(window.location.href), t = e.getUrlComponents();
      return t.Protocol + "//" + t.HostNameAndPort + "/";
    }, n.getBrowserNetworkClient = function() {
      return window.fetch && window.Headers ? new Rn() : new Nn();
    }, n.blockReloadInHiddenIframes = function() {
      var e = F.hashContainsKnownProperties(window.location.hash);
      if (e && n.isInIframe())
        throw T.createBlockReloadInHiddenIframeError();
    }, n.blockRedirectInIframe = function(e, t) {
      var r = n.isInIframe();
      if (e === S.Redirect && r && !t)
        throw T.createRedirectInIframeError(r);
    }, n.blockAcquireTokenInPopups = function() {
      if (n.isInPopup())
        throw T.createBlockAcquireTokenInPopupsError();
    }, n.blockNonBrowserEnvironment = function(e) {
      if (!e)
        throw T.createNonBrowserEnvironmentError();
    }, n.blockNativeBrokerCalledBeforeInitialized = function(e, t) {
      if (e && !t)
        throw T.createNativeBrokerCalledBeforeInitialize();
    }, n.detectIEOrEdge = function() {
      var e = window.navigator.userAgent, t = e.indexOf("MSIE "), r = e.indexOf("Trident/"), o = e.indexOf("Edge/"), i = t > 0 || r > 0, a = o > 0;
      return i || a;
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Gr = (
  /** @class */
  function() {
    function n(e, t, r, o, i, a, s, c, u) {
      this.config = e, this.browserStorage = t, this.browserCrypto = r, this.networkClient = this.config.system.networkClient, this.eventHandler = i, this.navigationClient = a, this.nativeMessageHandler = c, this.correlationId = u || this.browserCrypto.createNewGuid(), this.logger = o.clone(ve.MSAL_SKU, ct, this.correlationId), this.performanceClient = s;
    }
    return n.prototype.clearCacheOnLogout = function(e) {
      return v(this, void 0, void 0, function() {
        return y(this, function(t) {
          switch (t.label) {
            case 0:
              if (!e)
                return [3, 5];
              J.accountInfoIsEqual(e, this.browserStorage.getActiveAccount(), !1) && (this.logger.verbose("Setting active account to null"), this.browserStorage.setActiveAccount(null)), t.label = 1;
            case 1:
              return t.trys.push([1, 3, , 4]), [4, this.browserStorage.removeAccount(J.generateAccountCacheKey(e))];
            case 2:
              return t.sent(), this.logger.verbose("Cleared cache items belonging to the account provided in the logout request."), [3, 4];
            case 3:
              return t.sent(), this.logger.error("Account provided in logout request was not found. Local cache unchanged."), [3, 4];
            case 4:
              return [3, 9];
            case 5:
              return t.trys.push([5, 8, , 9]), this.logger.verbose("No account provided in logout request, clearing all cache items.", this.correlationId), [4, this.browserStorage.clear()];
            case 6:
              return t.sent(), [4, this.browserCrypto.clearKeystore()];
            case 7:
              return t.sent(), [3, 9];
            case 8:
              return t.sent(), this.logger.error("Attempted to clear all MSAL cache items and failed. Local cache unchanged."), [3, 9];
            case 9:
              return [
                2
                /*return*/
              ];
          }
        });
      });
    }, n.prototype.initializeBaseRequest = function(e) {
      return v(this, void 0, void 0, function() {
        var t, r, o, i;
        return y(this, function(a) {
          switch (a.label) {
            case 0:
              if (this.performanceClient.addQueueMeasurement(g.InitializeBaseRequest, e.correlationId), this.logger.verbose("Initializing BaseAuthRequest"), t = e.authority || this.config.auth.authority, r = Jt(e && e.scopes || []), o = A(A({}, e), {
                correlationId: this.correlationId,
                authority: t,
                scopes: r
              }), !o.authenticationScheme)
                o.authenticationScheme = K.BEARER, this.logger.verbose(`Authentication Scheme wasn't explicitly set in request, defaulting to "Bearer" request`);
              else {
                if (o.authenticationScheme === K.SSH) {
                  if (!e.sshJwk)
                    throw G.createMissingSshJwkError();
                  if (!e.sshKid)
                    throw G.createMissingSshKidError();
                }
                this.logger.verbose('Authentication Scheme set to "' + o.authenticationScheme + '" as configured in Auth request');
              }
              return e.claims && !I.isEmpty(e.claims) ? (i = o, [4, this.browserCrypto.hashString(e.claims)]) : [3, 2];
            case 1:
              i.requestedClaimsHash = a.sent(), a.label = 2;
            case 2:
              return [2, o];
          }
        });
      });
    }, n.prototype.getRedirectUri = function(e) {
      this.logger.verbose("getRedirectUri called");
      var t = e || this.config.auth.redirectUri || Y.getCurrentUri();
      return F.getAbsoluteUrl(t, Y.getCurrentUri());
    }, n.prototype.initializeServerTelemetryManager = function(e, t) {
      this.logger.verbose("initializeServerTelemetryManager called");
      var r = {
        clientId: this.config.auth.clientId,
        correlationId: this.correlationId,
        apiId: e,
        forceRefresh: t || !1,
        wrapperSKU: this.browserStorage.getWrapperMetadata()[0],
        wrapperVer: this.browserStorage.getWrapperMetadata()[1]
      };
      return new wn(r, this.browserStorage);
    }, n.prototype.getDiscoveredAuthority = function(e) {
      return v(this, void 0, void 0, function() {
        var t;
        return y(this, function(r) {
          switch (r.label) {
            case 0:
              return this.logger.verbose("getDiscoveredAuthority called"), t = {
                protocolMode: this.config.auth.protocolMode,
                knownAuthorities: this.config.auth.knownAuthorities,
                cloudDiscoveryMetadata: this.config.auth.cloudDiscoveryMetadata,
                authorityMetadata: this.config.auth.authorityMetadata
              }, e ? (this.logger.verbose("Creating discovered authority with request authority"), [4, Rt.createDiscoveredInstance(e, this.config.system.networkClient, this.browserStorage, t, this.logger)]) : [3, 2];
            case 1:
              return [2, r.sent()];
            case 2:
              return this.logger.verbose("Creating discovered authority with configured authority"), [4, Rt.createDiscoveredInstance(this.config.auth.authority, this.config.system.networkClient, this.browserStorage, t, this.logger)];
            case 3:
              return [2, r.sent()];
          }
        });
      });
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Ze = (
  /** @class */
  function(n) {
    X(e, n);
    function e() {
      return n !== null && n.apply(this, arguments) || this;
    }
    return e.prototype.initializeAuthorizationCodeRequest = function(t) {
      return v(this, void 0, void 0, function() {
        var r, o;
        return y(this, function(i) {
          switch (i.label) {
            case 0:
              return this.performanceClient.addQueueMeasurement(g.StandardInteractionClientInitializeAuthorizationCodeRequest, t.correlationId), this.logger.verbose("initializeAuthorizationRequest called", t.correlationId), [4, this.browserCrypto.generatePkceCodes()];
            case 1:
              return r = i.sent(), o = A(A({}, t), { redirectUri: t.redirectUri, code: h.EMPTY_STRING, codeVerifier: r.verifier }), t.codeChallenge = r.challenge, t.codeChallengeMethod = h.S256_CODE_CHALLENGE_METHOD, [2, o];
          }
        });
      });
    }, e.prototype.initializeLogoutRequest = function(t) {
      this.logger.verbose("initializeLogoutRequest called", t == null ? void 0 : t.correlationId);
      var r = A({ correlationId: this.correlationId || this.browserCrypto.createNewGuid() }, t);
      if (t)
        if (t.logoutHint)
          this.logger.verbose("logoutHint has already been set in logoutRequest");
        else if (t.account) {
          var o = this.getLogoutHintFromIdTokenClaims(t.account);
          o && (this.logger.verbose("Setting logoutHint to login_hint ID Token Claim value for the account provided"), r.logoutHint = o);
        } else
          this.logger.verbose("logoutHint was not set and account was not passed into logout request, logoutHint will not be set");
      else
        this.logger.verbose("logoutHint will not be set since no logout request was configured");
      return !t || t.postLogoutRedirectUri !== null ? t && t.postLogoutRedirectUri ? (this.logger.verbose("Setting postLogoutRedirectUri to uri set on logout request", r.correlationId), r.postLogoutRedirectUri = F.getAbsoluteUrl(t.postLogoutRedirectUri, Y.getCurrentUri())) : this.config.auth.postLogoutRedirectUri === null ? this.logger.verbose("postLogoutRedirectUri configured as null and no uri set on request, not passing post logout redirect", r.correlationId) : this.config.auth.postLogoutRedirectUri ? (this.logger.verbose("Setting postLogoutRedirectUri to configured uri", r.correlationId), r.postLogoutRedirectUri = F.getAbsoluteUrl(this.config.auth.postLogoutRedirectUri, Y.getCurrentUri())) : (this.logger.verbose("Setting postLogoutRedirectUri to current page", r.correlationId), r.postLogoutRedirectUri = F.getAbsoluteUrl(Y.getCurrentUri(), Y.getCurrentUri())) : this.logger.verbose("postLogoutRedirectUri passed as null, not setting post logout redirect uri", r.correlationId), r;
    }, e.prototype.getLogoutHintFromIdTokenClaims = function(t) {
      var r = t.idTokenClaims;
      if (r) {
        if (r.login_hint)
          return r.login_hint;
        this.logger.verbose("The ID Token Claims tied to the provided account do not contain a login_hint claim, logoutHint will not be added to logout request");
      } else
        this.logger.verbose("The provided account does not contain ID Token Claims, logoutHint will not be added to logout request");
      return null;
    }, e.prototype.createAuthCodeClient = function(t, r, o) {
      return v(this, void 0, void 0, function() {
        var i;
        return y(this, function(a) {
          switch (a.label) {
            case 0:
              return this.performanceClient.addQueueMeasurement(g.StandardInteractionClientCreateAuthCodeClient, this.correlationId), this.performanceClient.setPreQueueTime(g.StandardInteractionClientGetClientConfiguration, this.correlationId), [4, this.getClientConfiguration(t, r, o)];
            case 1:
              return i = a.sent(), [2, new Fr(i, this.performanceClient)];
          }
        });
      });
    }, e.prototype.getClientConfiguration = function(t, r, o) {
      return v(this, void 0, void 0, function() {
        var i, a;
        return y(this, function(s) {
          switch (s.label) {
            case 0:
              return this.performanceClient.addQueueMeasurement(g.StandardInteractionClientGetClientConfiguration, this.correlationId), this.logger.verbose("getClientConfiguration called", this.correlationId), this.performanceClient.setPreQueueTime(g.StandardInteractionClientGetDiscoveredAuthority, this.correlationId), [4, this.getDiscoveredAuthority(r, o)];
            case 1:
              return i = s.sent(), a = this.config.system.loggerOptions, [2, {
                authOptions: {
                  clientId: this.config.auth.clientId,
                  authority: i,
                  clientCapabilities: this.config.auth.clientCapabilities
                },
                systemOptions: {
                  tokenRenewalOffsetSeconds: this.config.system.tokenRenewalOffsetSeconds,
                  preventCorsPreflight: !0
                },
                loggerOptions: {
                  loggerCallback: a.loggerCallback,
                  piiLoggingEnabled: a.piiLoggingEnabled,
                  logLevel: a.logLevel,
                  correlationId: this.correlationId
                },
                cryptoInterface: this.browserCrypto,
                networkInterface: this.networkClient,
                storageInterface: this.browserStorage,
                serverTelemetryManager: t,
                libraryInfo: {
                  sku: ve.MSAL_SKU,
                  version: ct,
                  cpu: h.EMPTY_STRING,
                  os: h.EMPTY_STRING
                },
                telemetry: this.config.telemetry
              }];
          }
        });
      });
    }, e.prototype.validateAndExtractStateFromHash = function(t, r, o) {
      if (this.logger.verbose("validateAndExtractStateFromHash called", o), !t.state)
        throw T.createHashDoesNotContainStateError();
      var i = qr.extractBrowserRequestState(this.browserCrypto, t.state);
      if (!i)
        throw T.createUnableToParseStateError();
      if (i.interactionType !== r)
        throw T.createStateInteractionTypeMismatchError();
      return this.logger.verbose("Returning state from hash", o), t.state;
    }, e.prototype.getDiscoveredAuthority = function(t, r) {
      var o;
      return v(this, void 0, void 0, function() {
        var i, a, s, c;
        return y(this, function(u) {
          switch (u.label) {
            case 0:
              return this.performanceClient.addQueueMeasurement(g.StandardInteractionClientGetDiscoveredAuthority, this.correlationId), this.logger.verbose("getDiscoveredAuthority called", this.correlationId), i = (o = this.performanceClient) === null || o === void 0 ? void 0 : o.startMeasurement(g.StandardInteractionClientGetDiscoveredAuthority, this.correlationId), a = {
                protocolMode: this.config.auth.protocolMode,
                knownAuthorities: this.config.auth.knownAuthorities,
                cloudDiscoveryMetadata: this.config.auth.cloudDiscoveryMetadata,
                authorityMetadata: this.config.auth.authorityMetadata,
                skipAuthorityMetadataCache: this.config.auth.skipAuthorityMetadataCache
              }, s = t || this.config.auth.authority, c = dt.generateAuthority(s, r || this.config.auth.azureCloudOptions), this.logger.verbose("Creating discovered authority with configured authority", this.correlationId), this.performanceClient.setPreQueueTime(g.AuthorityFactoryCreateDiscoveredInstance, this.correlationId), [4, Rt.createDiscoveredInstance(c, this.config.system.networkClient, this.browserStorage, a, this.logger, this.performanceClient, this.correlationId).then(function(l) {
                return i.endMeasurement({
                  success: !0
                }), l;
              }).catch(function(l) {
                throw i.endMeasurement({
                  errorCode: l.errorCode,
                  subErrorCode: l.subError,
                  success: !1
                }), l;
              })];
            case 1:
              return [2, u.sent()];
          }
        });
      });
    }, e.prototype.initializeAuthorizationRequest = function(t, r) {
      return v(this, void 0, void 0, function() {
        var o, i, a, s, c, u, l;
        return y(this, function(d) {
          switch (d.label) {
            case 0:
              return this.performanceClient.addQueueMeasurement(g.StandardInteractionClientInitializeAuthorizationRequest, this.correlationId), this.logger.verbose("initializeAuthorizationRequest called", this.correlationId), o = this.getRedirectUri(t.redirectUri), i = {
                interactionType: r
              }, a = be.setRequestState(this.browserCrypto, t && t.state || h.EMPTY_STRING, i), this.performanceClient.setPreQueueTime(g.InitializeBaseRequest, this.correlationId), c = [{}], [4, this.initializeBaseRequest(t)];
            case 1:
              return s = A.apply(void 0, [A.apply(void 0, c.concat([d.sent()])), { redirectUri: o, state: a, nonce: t.nonce || this.browserCrypto.createNewGuid(), responseMode: Et.FRAGMENT }]), u = t.account || this.browserStorage.getActiveAccount(), u && (this.logger.verbose("Setting validated request account", this.correlationId), this.logger.verbosePii("Setting validated request account: " + u.homeAccountId, this.correlationId), s.account = u), I.isEmpty(s.loginHint) && !u && (l = this.browserStorage.getLegacyLoginHint(), l && (s.loginHint = l)), [2, s];
          }
        });
      });
    }, e;
  }(Gr)
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var tr = (
  /** @class */
  function() {
    function n(e, t, r, o, i) {
      this.authModule = e, this.browserStorage = t, this.authCodeRequest = r, this.logger = o, this.performanceClient = i;
    }
    return n.prototype.handleCodeResponseFromHash = function(e, t, r, o) {
      return v(this, void 0, void 0, function() {
        var i, a, s;
        return y(this, function(c) {
          if (this.performanceClient.addQueueMeasurement(g.HandleCodeResponseFromHash, this.authCodeRequest.correlationId), this.logger.verbose("InteractionHandler.handleCodeResponse called"), I.isEmpty(e))
            throw T.createEmptyHashError(e);
          if (i = this.browserStorage.generateStateKey(t), a = this.browserStorage.getTemporaryCache(i), !a)
            throw w.createStateNotFoundError("Cached State");
          try {
            s = this.authModule.handleFragmentResponse(e, a);
          } catch (u) {
            throw u instanceof Be && u.subError === E.userCancelledError.code ? T.createUserCancelledError() : u;
          }
          return this.performanceClient.setPreQueueTime(g.HandleCodeResponseFromServer, this.authCodeRequest.correlationId), [2, this.handleCodeResponseFromServer(s, t, r, o)];
        });
      });
    }, n.prototype.handleCodeResponseFromServer = function(e, t, r, o, i) {
      return i === void 0 && (i = !0), v(this, void 0, void 0, function() {
        var a, s, c, u, l, d;
        return y(this, function(p) {
          switch (p.label) {
            case 0:
              if (this.performanceClient.addQueueMeasurement(g.HandleCodeResponseFromServer, this.authCodeRequest.correlationId), this.logger.trace("InteractionHandler.handleCodeResponseFromServer called"), a = this.browserStorage.generateStateKey(t), s = this.browserStorage.getTemporaryCache(a), !s)
                throw w.createStateNotFoundError("Cached State");
              return c = this.browserStorage.generateNonceKey(s), u = this.browserStorage.getTemporaryCache(c), this.authCodeRequest.code = e.code, e.cloud_instance_host_name ? (this.performanceClient.setPreQueueTime(g.UpdateTokenEndpointAuthority, this.authCodeRequest.correlationId), [4, this.updateTokenEndpointAuthority(e.cloud_instance_host_name, r, o)]) : [3, 2];
            case 1:
              p.sent(), p.label = 2;
            case 2:
              return i && (e.nonce = u || void 0), e.state = s, e.client_info ? this.authCodeRequest.clientInfo = e.client_info : (l = this.checkCcsCredentials(), l && (this.authCodeRequest.ccsCredential = l)), this.performanceClient.setPreQueueTime(g.AuthClientAcquireToken, this.authCodeRequest.correlationId), [4, this.authModule.acquireToken(this.authCodeRequest, e)];
            case 3:
              return d = p.sent(), this.browserStorage.cleanRequestByState(t), [2, d];
          }
        });
      });
    }, n.prototype.updateTokenEndpointAuthority = function(e, t, r) {
      return v(this, void 0, void 0, function() {
        var o, i;
        return y(this, function(a) {
          switch (a.label) {
            case 0:
              return this.performanceClient.addQueueMeasurement(g.UpdateTokenEndpointAuthority, this.authCodeRequest.correlationId), o = "https://" + e + "/" + t.tenant + "/", [4, Rt.createDiscoveredInstance(o, r, this.browserStorage, t.options, this.logger, this.performanceClient, this.authCodeRequest.correlationId)];
            case 1:
              return i = a.sent(), this.authModule.updateAuthority(i), [
                2
                /*return*/
              ];
          }
        });
      });
    }, n.prototype.checkCcsCredentials = function() {
      var e = this.browserStorage.getTemporaryCache(x.CCS_CREDENTIAL, !0);
      if (e)
        try {
          return JSON.parse(e);
        } catch {
          this.authModule.logger.error("Cache credential could not be parsed"), this.authModule.logger.errorPii("Cache credential could not be parsed: " + e);
        }
      return null;
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Er = (
  /** @class */
  function(n) {
    X(e, n);
    function e(t, r, o, i, a, s) {
      var c = n.call(this, t, r, o, i, s) || this;
      return c.browserCrypto = a, c;
    }
    return e.prototype.initiateAuthRequest = function(t, r) {
      return v(this, void 0, void 0, function() {
        var o, i;
        return y(this, function(a) {
          switch (a.label) {
            case 0:
              return this.logger.verbose("RedirectHandler.initiateAuthRequest called"), I.isEmpty(t) ? [3, 7] : (r.redirectStartPage && (this.logger.verbose("RedirectHandler.initiateAuthRequest: redirectStartPage set, caching start page"), this.browserStorage.setTemporaryCache(x.ORIGIN_URI, r.redirectStartPage, !0)), this.browserStorage.setTemporaryCache(x.CORRELATION_ID, this.authCodeRequest.correlationId, !0), this.browserStorage.cacheCodeRequest(this.authCodeRequest, this.browserCrypto), this.logger.infoPii("RedirectHandler.initiateAuthRequest: Navigate to: " + t), o = {
                apiId: q.acquireTokenRedirect,
                timeout: r.redirectTimeout,
                noHistory: !1
              }, typeof r.onRedirectNavigate != "function" ? [3, 4] : (this.logger.verbose("RedirectHandler.initiateAuthRequest: Invoking onRedirectNavigate callback"), i = r.onRedirectNavigate(t), i === !1 ? [3, 2] : (this.logger.verbose("RedirectHandler.initiateAuthRequest: onRedirectNavigate did not return false, navigating"), [4, r.navigationClient.navigateExternal(t, o)])));
            case 1:
              return a.sent(), [
                2
                /*return*/
              ];
            case 2:
              return this.logger.verbose("RedirectHandler.initiateAuthRequest: onRedirectNavigate returned false, stopping navigation"), [
                2
                /*return*/
              ];
            case 3:
              return [3, 6];
            case 4:
              return this.logger.verbose("RedirectHandler.initiateAuthRequest: Navigating window to navigate url"), [4, r.navigationClient.navigateExternal(t, o)];
            case 5:
              return a.sent(), [
                2
                /*return*/
              ];
            case 6:
              return [3, 8];
            case 7:
              throw this.logger.info("RedirectHandler.initiateAuthRequest: Navigate url is empty"), T.createEmptyNavigationUriError();
            case 8:
              return [
                2
                /*return*/
              ];
          }
        });
      });
    }, e.prototype.handleCodeResponseFromHash = function(t, r, o, i) {
      return v(this, void 0, void 0, function() {
        var a, s, c, u, l, d, p;
        return y(this, function(f) {
          switch (f.label) {
            case 0:
              if (this.logger.verbose("RedirectHandler.handleCodeResponse called"), I.isEmpty(t))
                throw T.createEmptyHashError(t);
              if (this.browserStorage.setInteractionInProgress(!1), a = this.browserStorage.generateStateKey(r), s = this.browserStorage.getTemporaryCache(a), !s)
                throw w.createStateNotFoundError("Cached State");
              try {
                c = this.authModule.handleFragmentResponse(t, s);
              } catch (m) {
                throw m instanceof Be && m.subError === E.userCancelledError.code ? T.createUserCancelledError() : m;
              }
              return u = this.browserStorage.generateNonceKey(s), l = this.browserStorage.getTemporaryCache(u), this.authCodeRequest.code = c.code, c.cloud_instance_host_name ? [4, this.updateTokenEndpointAuthority(c.cloud_instance_host_name, o, i)] : [3, 2];
            case 1:
              f.sent(), f.label = 2;
            case 2:
              return c.nonce = l || void 0, c.state = s, c.client_info ? this.authCodeRequest.clientInfo = c.client_info : (d = this.checkCcsCredentials(), d && (this.authCodeRequest.ccsCredential = d)), [4, this.authModule.acquireToken(this.authCodeRequest, c)];
            case 3:
              return p = f.sent(), this.browserStorage.cleanRequestByState(r), [2, p];
          }
        });
      });
    }, e;
  }(tr)
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var P;
(function(n) {
  n.INITIALIZE_START = "msal:initializeStart", n.INITIALIZE_END = "msal:initializeEnd", n.ACCOUNT_ADDED = "msal:accountAdded", n.ACCOUNT_REMOVED = "msal:accountRemoved", n.LOGIN_START = "msal:loginStart", n.LOGIN_SUCCESS = "msal:loginSuccess", n.LOGIN_FAILURE = "msal:loginFailure", n.ACQUIRE_TOKEN_START = "msal:acquireTokenStart", n.ACQUIRE_TOKEN_SUCCESS = "msal:acquireTokenSuccess", n.ACQUIRE_TOKEN_FAILURE = "msal:acquireTokenFailure", n.ACQUIRE_TOKEN_NETWORK_START = "msal:acquireTokenFromNetworkStart", n.SSO_SILENT_START = "msal:ssoSilentStart", n.SSO_SILENT_SUCCESS = "msal:ssoSilentSuccess", n.SSO_SILENT_FAILURE = "msal:ssoSilentFailure", n.ACQUIRE_TOKEN_BY_CODE_START = "msal:acquireTokenByCodeStart", n.ACQUIRE_TOKEN_BY_CODE_SUCCESS = "msal:acquireTokenByCodeSuccess", n.ACQUIRE_TOKEN_BY_CODE_FAILURE = "msal:acquireTokenByCodeFailure", n.HANDLE_REDIRECT_START = "msal:handleRedirectStart", n.HANDLE_REDIRECT_END = "msal:handleRedirectEnd", n.POPUP_OPENED = "msal:popupOpened", n.LOGOUT_START = "msal:logoutStart", n.LOGOUT_SUCCESS = "msal:logoutSuccess", n.LOGOUT_FAILURE = "msal:logoutFailure", n.LOGOUT_END = "msal:logoutEnd";
})(P || (P = {}));
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Oe;
(function(n) {
  n.USER_INTERACTION_REQUIRED = "USER_INTERACTION_REQUIRED", n.USER_CANCEL = "USER_CANCEL", n.NO_NETWORK = "NO_NETWORK", n.TRANSIENT_ERROR = "TRANSIENT_ERROR", n.PERSISTENT_ERROR = "PERSISTENT_ERROR", n.DISABLED = "DISABLED", n.ACCOUNT_UNAVAILABLE = "ACCOUNT_UNAVAILABLE";
})(Oe || (Oe = {}));
var et = {
  extensionError: {
    code: "ContentError"
  },
  userSwitch: {
    code: "user_switch",
    desc: "User attempted to switch accounts in the native broker, which is not allowed. All new accounts must sign-in through the standard web flow first, please try again."
  },
  tokensNotFoundInCache: {
    code: "tokens_not_found_in_internal_memory_cache",
    desc: "Tokens not cached in MSAL JS internal memory, please make the WAM request"
  }
}, Ie = (
  /** @class */
  function(n) {
    X(e, n);
    function e(t, r, o) {
      var i = n.call(this, t, r) || this;
      return Object.setPrototypeOf(i, e.prototype), i.name = "NativeAuthError", i.ext = o, i;
    }
    return e.prototype.isFatal = function() {
      if (this.ext && this.ext.status && (this.ext.status === Oe.PERSISTENT_ERROR || this.ext.status === Oe.DISABLED))
        return !0;
      switch (this.errorCode) {
        case et.extensionError.code:
          return !0;
        default:
          return !1;
      }
    }, e.createError = function(t, r, o) {
      if (o && o.status)
        switch (o.status) {
          case Oe.ACCOUNT_UNAVAILABLE:
            return ye.createNativeAccountUnavailableError();
          case Oe.USER_INTERACTION_REQUIRED:
            return new ye(t, r);
          case Oe.USER_CANCEL:
            return T.createUserCancelledError();
          case Oe.NO_NETWORK:
            return T.createNoNetworkConnectivityError();
        }
      return new e(t, r, o);
    }, e.createUserSwitchError = function() {
      return new e(et.userSwitch.code, et.userSwitch.desc);
    }, e.createTokensNotFoundInCacheError = function() {
      return new e(et.tokensNotFoundInCache.code, et.tokensNotFoundInCache.desc);
    }, e;
  }(k)
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var zr = (
  /** @class */
  function(n) {
    X(e, n);
    function e() {
      return n !== null && n.apply(this, arguments) || this;
    }
    return e.prototype.acquireToken = function(t) {
      return v(this, void 0, void 0, function() {
        var r, o, i, a, s;
        return y(this, function(c) {
          switch (c.label) {
            case 0:
              return r = this.performanceClient.startMeasurement(g.SilentCacheClientAcquireToken, t.correlationId), o = this.initializeServerTelemetryManager(q.acquireTokenSilent_silentFlow), [4, this.createSilentFlowClient(o, t.authority, t.azureCloudOptions)];
            case 1:
              i = c.sent(), this.logger.verbose("Silent auth client created"), c.label = 2;
            case 2:
              return c.trys.push([2, 4, , 5]), [4, i.acquireCachedToken(t)];
            case 3:
              return a = c.sent(), r.endMeasurement({
                success: !0,
                fromCache: !0
              }), [2, a];
            case 4:
              throw s = c.sent(), s instanceof T && s.errorCode === E.signingKeyNotFoundInStorage.code && this.logger.verbose("Signing keypair for bound access token not found. Refreshing bound access token and generating a new crypto keypair."), r.endMeasurement({
                errorCode: s instanceof k && s.errorCode || void 0,
                subErrorCode: s instanceof k && s.subError || void 0,
                success: !1
              }), s;
            case 5:
              return [
                2
                /*return*/
              ];
          }
        });
      });
    }, e.prototype.logout = function() {
      return Promise.reject(T.createSilentLogoutUnsupportedError());
    }, e.prototype.createSilentFlowClient = function(t, r, o) {
      return v(this, void 0, void 0, function() {
        var i;
        return y(this, function(a) {
          switch (a.label) {
            case 0:
              return this.performanceClient.setPreQueueTime(g.StandardInteractionClientGetClientConfiguration, this.correlationId), [4, this.getClientConfiguration(t, r, o)];
            case 1:
              return i = a.sent(), [2, new vn(i, this.performanceClient)];
          }
        });
      });
    }, e.prototype.initializeSilentRequest = function(t, r) {
      return v(this, void 0, void 0, function() {
        var o;
        return y(this, function(i) {
          switch (i.label) {
            case 0:
              return this.performanceClient.addQueueMeasurement(g.InitializeSilentRequest, this.correlationId), this.performanceClient.setPreQueueTime(g.InitializeBaseRequest, this.correlationId), o = [A({}, t)], [4, this.initializeBaseRequest(t)];
            case 1:
              return [2, A.apply(void 0, [A.apply(void 0, o.concat([i.sent()])), { account: r, forceRefresh: t.forceRefresh || !1 }])];
          }
        });
      });
    }, e;
  }(Ze)
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var We = (
  /** @class */
  function(n) {
    X(e, n);
    function e(t, r, o, i, a, s, c, u, l, d, p, f) {
      var m = n.call(this, t, r, o, i, a, s, u, l, f) || this;
      return m.apiId = c, m.accountId = d, m.nativeMessageHandler = l, m.nativeStorageManager = p, m.silentCacheClient = new zr(t, m.nativeStorageManager, o, i, a, s, u, l, f), m;
    }
    return e.prototype.acquireToken = function(t) {
      return v(this, void 0, void 0, function() {
        var r, o, i, a, s, c, u;
        return y(this, function(l) {
          switch (l.label) {
            case 0:
              return this.logger.trace("NativeInteractionClient - acquireToken called."), r = this.performanceClient.startMeasurement(g.NativeInteractionClientAcquireToken, t.correlationId), o = fe.nowSeconds(), [4, this.initializeNativeRequest(t)];
            case 1:
              i = l.sent(), l.label = 2;
            case 2:
              return l.trys.push([2, 4, , 5]), [4, this.acquireTokensFromCache(this.accountId, i)];
            case 3:
              return a = l.sent(), r.endMeasurement({
                success: !0,
                isNativeBroker: !1,
                fromCache: !0
              }), [2, a];
            case 4:
              return l.sent(), this.logger.info("MSAL internal Cache does not contain tokens, proceed to make a native call"), [3, 5];
            case 5:
              return s = {
                method: ke.GetToken,
                request: i
              }, [4, this.nativeMessageHandler.sendMessage(s)];
            case 6:
              return c = l.sent(), u = this.validateNativeResponse(c), [2, this.handleNativeResponse(u, i, o).then(function(d) {
                return r.endMeasurement({
                  success: !0,
                  isNativeBroker: !0,
                  requestId: d.requestId
                }), d;
              }).catch(function(d) {
                throw r.endMeasurement({
                  success: !1,
                  errorCode: d.errorCode,
                  subErrorCode: d.subError,
                  isNativeBroker: !0
                }), d;
              })];
          }
        });
      });
    }, e.prototype.createSilentCacheRequest = function(t, r) {
      return {
        authority: t.authority,
        correlationId: this.correlationId,
        scopes: Z.fromString(t.scope).asArray(),
        account: r,
        forceRefresh: !1
      };
    }, e.prototype.acquireTokensFromCache = function(t, r) {
      return v(this, void 0, void 0, function() {
        var o, i, a, s;
        return y(this, function(c) {
          switch (c.label) {
            case 0:
              if (!t)
                throw this.logger.warning("NativeInteractionClient:acquireTokensFromCache - No nativeAccountId provided"), w.createNoAccountFoundError();
              if (o = this.browserStorage.getAccountInfoFilteredBy({ nativeAccountId: t }), !o)
                throw w.createNoAccountFoundError();
              c.label = 1;
            case 1:
              return c.trys.push([1, 3, , 4]), i = this.createSilentCacheRequest(r, o), [4, this.silentCacheClient.acquireToken(i)];
            case 2:
              return a = c.sent(), [2, a];
            case 3:
              throw s = c.sent(), s;
            case 4:
              return [
                2
                /*return*/
              ];
          }
        });
      });
    }, e.prototype.acquireTokenRedirect = function(t) {
      return v(this, void 0, void 0, function() {
        var r, o, i, a, s, c;
        return y(this, function(u) {
          switch (u.label) {
            case 0:
              return this.logger.trace("NativeInteractionClient - acquireTokenRedirect called."), [4, this.initializeNativeRequest(t)];
            case 1:
              r = u.sent(), o = {
                method: ke.GetToken,
                request: r
              }, u.label = 2;
            case 2:
              return u.trys.push([2, 4, , 5]), [4, this.nativeMessageHandler.sendMessage(o)];
            case 3:
              return i = u.sent(), this.validateNativeResponse(i), [3, 5];
            case 4:
              if (a = u.sent(), a instanceof Ie && a.isFatal())
                throw a;
              return [3, 5];
            case 5:
              return this.browserStorage.setTemporaryCache(x.NATIVE_REQUEST, JSON.stringify(r), !0), s = {
                apiId: q.acquireTokenRedirect,
                timeout: this.config.system.redirectNavigationTimeout,
                noHistory: !1
              }, c = this.config.auth.navigateToLoginRequestUrl ? window.location.href : this.getRedirectUri(t.redirectUri), [4, this.navigationClient.navigateExternal(c, s)];
            case 6:
              return u.sent(), [
                2
                /*return*/
              ];
          }
        });
      });
    }, e.prototype.handleRedirectPromise = function() {
      return v(this, void 0, void 0, function() {
        var t, r, o, i, a, s, c, u;
        return y(this, function(l) {
          switch (l.label) {
            case 0:
              if (this.logger.trace("NativeInteractionClient - handleRedirectPromise called."), !this.browserStorage.isInteractionInProgress(!0))
                return this.logger.info("handleRedirectPromise called but there is no interaction in progress, returning null."), [2, null];
              if (t = this.browserStorage.getCachedNativeRequest(), !t)
                return this.logger.verbose("NativeInteractionClient - handleRedirectPromise called but there is no cached request, returning null."), [2, null];
              r = t.prompt, o = ar(t, ["prompt"]), r && this.logger.verbose("NativeInteractionClient - handleRedirectPromise called and prompt was included in the original request, removing prompt from cached request to prevent second interaction with native broker window."), this.browserStorage.removeItem(this.browserStorage.generateCacheKey(x.NATIVE_REQUEST)), i = {
                method: ke.GetToken,
                request: o
              }, a = fe.nowSeconds(), l.label = 1;
            case 1:
              return l.trys.push([1, 3, , 4]), this.logger.verbose("NativeInteractionClient - handleRedirectPromise sending message to native broker."), [4, this.nativeMessageHandler.sendMessage(i)];
            case 2:
              return s = l.sent(), this.validateNativeResponse(s), c = this.handleNativeResponse(s, o, a), this.browserStorage.setInteractionInProgress(!1), [2, c];
            case 3:
              throw u = l.sent(), this.browserStorage.setInteractionInProgress(!1), u;
            case 4:
              return [
                2
                /*return*/
              ];
          }
        });
      });
    }, e.prototype.logout = function() {
      return this.logger.trace("NativeInteractionClient - logout called."), Promise.reject("Logout not implemented yet");
    }, e.prototype.handleNativeResponse = function(t, r, o) {
      return v(this, void 0, void 0, function() {
        var i, a, s, c, u, l;
        return y(this, function(d) {
          switch (d.label) {
            case 0:
              if (this.logger.trace("NativeInteractionClient - handleNativeResponse called."), t.account.id !== r.accountId)
                throw Ie.createUserSwitchError();
              return [4, this.getDiscoveredAuthority(r.authority)];
            case 1:
              return i = d.sent(), a = i.getPreferredCache(), s = this.createIdTokenObj(t), c = this.createHomeAccountIdentifier(t, s), u = this.createAccountEntity(t, c, s, a), [4, this.generateAuthenticationResult(t, r, s, u, i.canonicalAuthority, o)];
            case 2:
              return l = d.sent(), this.cacheAccount(u), this.cacheNativeTokens(t, r, c, s, l.accessToken, l.tenantId, o), [2, l];
          }
        });
      });
    }, e.prototype.createIdTokenObj = function(t) {
      return new we(t.id_token || h.EMPTY_STRING, this.browserCrypto);
    }, e.prototype.createHomeAccountIdentifier = function(t, r) {
      var o = J.generateHomeAccountId(t.client_info || h.EMPTY_STRING, se.Default, this.logger, this.browserCrypto, r);
      return o;
    }, e.prototype.createAccountEntity = function(t, r, o, i) {
      return J.createAccount(t.client_info, r, o, void 0, void 0, void 0, i, t.account.id);
    }, e.prototype.generateScopes = function(t, r) {
      return t.scope ? Z.fromString(t.scope) : Z.fromString(r.scope);
    }, e.prototype.generatePopAccessToken = function(t, r) {
      return v(this, void 0, void 0, function() {
        var o, i;
        return y(this, function(a) {
          switch (a.label) {
            case 0:
              if (r.tokenType !== K.POP)
                return [3, 2];
              if (t.shr)
                return this.logger.trace("handleNativeServerResponse: SHR is enabled in native layer"), [2, t.shr];
              if (o = new Xe(this.browserCrypto), i = {
                resourceRequestMethod: r.resourceRequestMethod,
                resourceRequestUri: r.resourceRequestUri,
                shrClaims: r.shrClaims,
                shrNonce: r.shrNonce
              }, !r.keyId)
                throw w.createKeyIdMissingError();
              return [4, o.signPopToken(t.access_token, r.keyId, i)];
            case 1:
              return [2, a.sent()];
            case 2:
              return [2, t.access_token];
          }
        });
      });
    }, e.prototype.generateAuthenticationResult = function(t, r, o, i, a, s) {
      return v(this, void 0, void 0, function() {
        var c, u, l, d, p, f, m, C;
        return y(this, function(R) {
          switch (R.label) {
            case 0:
              return c = this.addTelemetryFromNativeResponse(t), u = t.scope ? Z.fromString(t.scope) : Z.fromString(r.scope), l = t.account.properties || {}, d = l.UID || o.claims.oid || o.claims.sub || h.EMPTY_STRING, p = l.TenantId || o.claims.tid || h.EMPTY_STRING, [4, this.generatePopAccessToken(t, r)];
            case 1:
              return f = R.sent(), m = r.tokenType === K.POP ? K.POP : K.BEARER, C = {
                authority: a,
                uniqueId: d,
                tenantId: p,
                scopes: u.asArray(),
                account: i.getAccountInfo(),
                idToken: t.id_token,
                idTokenClaims: o.claims,
                accessToken: f,
                fromCache: c ? this.isResponseFromCache(c) : !1,
                expiresOn: new Date(Number(s + t.expires_in) * 1e3),
                tokenType: m,
                correlationId: this.correlationId,
                state: t.state,
                fromNativeBroker: !0
              }, [2, C];
          }
        });
      });
    }, e.prototype.cacheAccount = function(t) {
      var r = this;
      this.browserStorage.setAccount(t), this.browserStorage.removeAccountContext(t).catch(function(o) {
        r.logger.error("Error occurred while removing account context from browser storage. " + o);
      });
    }, e.prototype.cacheNativeTokens = function(t, r, o, i, a, s, c) {
      var u = Fe.createIdTokenEntity(o, r.authority, t.id_token || h.EMPTY_STRING, r.clientId, i.claims.tid || h.EMPTY_STRING);
      this.nativeStorageManager.setIdTokenCredential(u);
      var l = r.tokenType === K.POP ? h.SHR_NONCE_VALIDITY : (typeof t.expires_in == "string" ? parseInt(t.expires_in, 10) : t.expires_in) || 0, d = c + l, p = this.generateScopes(t, r), f = xe.createAccessTokenEntity(o, r.authority, a, r.clientId, s, p.printScopes(), d, 0, this.browserCrypto);
      this.nativeStorageManager.setAccessTokenCredential(f);
    }, e.prototype.addTelemetryFromNativeResponse = function(t) {
      var r = this.getMATSFromResponse(t);
      return r ? (this.performanceClient.addStaticFields({
        extensionId: this.nativeMessageHandler.getExtensionId(),
        extensionVersion: this.nativeMessageHandler.getExtensionVersion(),
        matsBrokerVersion: r.broker_version,
        matsAccountJoinOnStart: r.account_join_on_start,
        matsAccountJoinOnEnd: r.account_join_on_end,
        matsDeviceJoin: r.device_join,
        matsPromptBehavior: r.prompt_behavior,
        matsApiErrorCode: r.api_error_code,
        matsUiVisible: r.ui_visible,
        matsSilentCode: r.silent_code,
        matsSilentBiSubCode: r.silent_bi_sub_code,
        matsSilentMessage: r.silent_message,
        matsSilentStatus: r.silent_status,
        matsHttpStatus: r.http_status,
        matsHttpEventCount: r.http_event_count
      }, this.correlationId), r) : null;
    }, e.prototype.validateNativeResponse = function(t) {
      if (t.hasOwnProperty("access_token") && t.hasOwnProperty("id_token") && t.hasOwnProperty("client_info") && t.hasOwnProperty("account") && t.hasOwnProperty("scope") && t.hasOwnProperty("expires_in"))
        return t;
      throw Ie.createUnexpectedError("Response missing expected properties.");
    }, e.prototype.getMATSFromResponse = function(t) {
      if (t.properties.MATS)
        try {
          return JSON.parse(t.properties.MATS);
        } catch {
          this.logger.error("NativeInteractionClient - Error parsing MATS telemetry, returning null instead");
        }
      return null;
    }, e.prototype.isResponseFromCache = function(t) {
      return typeof t.is_cached > "u" ? (this.logger.verbose("NativeInteractionClient - MATS telemetry does not contain field indicating if response was served from cache. Returning false."), !1) : !!t.is_cached;
    }, e.prototype.initializeNativeRequest = function(t) {
      return v(this, void 0, void 0, function() {
        var r, o, i, a, s, c, u, l, d, p, f = this;
        return y(this, function(m) {
          switch (m.label) {
            case 0:
              return this.logger.trace("NativeInteractionClient - initializeNativeRequest called"), r = t.authority || this.config.auth.authority, o = new F(r), o.validateAsUri(), i = t.scopes, a = ar(t, ["scopes"]), s = new Z(i || []), s.appendScopes(pt), c = function() {
                switch (f.apiId) {
                  case q.ssoSilent:
                  case q.acquireTokenSilent_silentFlow:
                    return f.logger.trace("initializeNativeRequest: silent request sets prompt to none"), ee.NONE;
                }
                if (!t.prompt) {
                  f.logger.trace("initializeNativeRequest: prompt was not provided");
                  return;
                }
                switch (t.prompt) {
                  case ee.NONE:
                  case ee.CONSENT:
                  case ee.LOGIN:
                    return f.logger.trace("initializeNativeRequest: prompt is compatible with native flow"), t.prompt;
                  default:
                    throw f.logger.trace("initializeNativeRequest: prompt = " + t.prompt + " is not compatible with native flow"), T.createNativePromptParameterNotSupportedError();
                }
              }, u = A(A({}, a), {
                accountId: this.accountId,
                clientId: this.config.auth.clientId,
                authority: o.urlString,
                scope: s.printScopes(),
                redirectUri: this.getRedirectUri(t.redirectUri),
                prompt: c(),
                correlationId: this.correlationId,
                tokenType: t.authenticationScheme,
                windowTitleSubstring: document.title,
                extraParameters: A(A(A({}, t.extraQueryParameters), t.tokenQueryParameters), { telemetry: rt.MATS_TELEMETRY }),
                extendedExpiryToken: !1
                // Make this configurable?
              }), t.authenticationScheme !== K.POP ? [3, 2] : (l = {
                resourceRequestUri: t.resourceRequestUri,
                resourceRequestMethod: t.resourceRequestMethod,
                shrClaims: t.shrClaims,
                shrNonce: t.shrNonce
              }, d = new Xe(this.browserCrypto), [4, d.generateCnf(l)]);
            case 1:
              p = m.sent(), u.reqCnf = p.reqCnfHash, u.keyId = p.kid, m.label = 2;
            case 2:
              return [2, u];
          }
        });
      });
    }, e;
  }(Gr)
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Ke = (
  /** @class */
  function() {
    function n(e, t, r, o) {
      this.logger = e, this.handshakeTimeoutMs = t, this.extensionId = o, this.resolvers = /* @__PURE__ */ new Map(), this.handshakeResolvers = /* @__PURE__ */ new Map(), this.responseId = 0, this.messageChannel = new MessageChannel(), this.windowListener = this.onWindowMessage.bind(this), this.performanceClient = r, this.handshakeEvent = r.startMeasurement(g.NativeMessageHandlerHandshake);
    }
    return n.prototype.sendMessage = function(e) {
      return v(this, void 0, void 0, function() {
        var t, r = this;
        return y(this, function(o) {
          return this.logger.trace("NativeMessageHandler - sendMessage called."), t = {
            channel: rt.CHANNEL_ID,
            extensionId: this.extensionId,
            responseId: this.responseId++,
            body: e
          }, this.logger.trace("NativeMessageHandler - Sending request to browser extension"), this.logger.tracePii("NativeMessageHandler - Sending request to browser extension: " + JSON.stringify(t)), this.messageChannel.port1.postMessage(t), [2, new Promise(function(i, a) {
            r.resolvers.set(t.responseId, { resolve: i, reject: a });
          })];
        });
      });
    }, n.createProvider = function(e, t, r) {
      return v(this, void 0, void 0, function() {
        var o, i;
        return y(this, function(a) {
          switch (a.label) {
            case 0:
              e.trace("NativeMessageHandler - createProvider called."), a.label = 1;
            case 1:
              return a.trys.push([1, 3, , 5]), o = new n(e, t, r, rt.PREFERRED_EXTENSION_ID), [4, o.sendHandshakeRequest()];
            case 2:
              return a.sent(), [2, o];
            case 3:
              return a.sent(), i = new n(e, t, r), [4, i.sendHandshakeRequest()];
            case 4:
              return a.sent(), [2, i];
            case 5:
              return [
                2
                /*return*/
              ];
          }
        });
      });
    }, n.prototype.sendHandshakeRequest = function() {
      return v(this, void 0, void 0, function() {
        var e, t = this;
        return y(this, function(r) {
          return this.logger.trace("NativeMessageHandler - sendHandshakeRequest called."), window.addEventListener("message", this.windowListener, !1), e = {
            channel: rt.CHANNEL_ID,
            extensionId: this.extensionId,
            responseId: this.responseId++,
            body: {
              method: ke.HandshakeRequest
            }
          }, this.handshakeEvent.addStaticFields({
            extensionId: this.extensionId,
            extensionHandshakeTimeoutMs: this.handshakeTimeoutMs
          }), this.messageChannel.port1.onmessage = function(o) {
            t.onChannelMessage(o);
          }, window.postMessage(e, window.origin, [this.messageChannel.port2]), [2, new Promise(function(o, i) {
            t.handshakeResolvers.set(e.responseId, { resolve: o, reject: i }), t.timeoutId = window.setTimeout(function() {
              window.removeEventListener("message", t.windowListener, !1), t.messageChannel.port1.close(), t.messageChannel.port2.close(), t.handshakeEvent.endMeasurement({ extensionHandshakeTimedOut: !0, success: !1 }), i(T.createNativeHandshakeTimeoutError()), t.handshakeResolvers.delete(e.responseId);
            }, t.handshakeTimeoutMs);
          })];
        });
      });
    }, n.prototype.onWindowMessage = function(e) {
      if (this.logger.trace("NativeMessageHandler - onWindowMessage called"), e.source === window) {
        var t = e.data;
        if (!(!t.channel || t.channel !== rt.CHANNEL_ID) && !(t.extensionId && t.extensionId !== this.extensionId) && t.body.method === ke.HandshakeRequest) {
          this.logger.verbose(t.extensionId ? "Extension with id: " + t.extensionId + " not installed" : "No extension installed"), clearTimeout(this.timeoutId), this.messageChannel.port1.close(), this.messageChannel.port2.close(), window.removeEventListener("message", this.windowListener, !1);
          var r = this.handshakeResolvers.get(t.responseId);
          r && (this.handshakeEvent.endMeasurement({ success: !1, extensionInstalled: !1 }), r.reject(T.createNativeExtensionNotInstalledError()));
        }
      }
    }, n.prototype.onChannelMessage = function(e) {
      this.logger.trace("NativeMessageHandler - onChannelMessage called.");
      var t = e.data, r = this.resolvers.get(t.responseId), o = this.handshakeResolvers.get(t.responseId);
      try {
        var i = t.body.method;
        if (i === ke.Response) {
          if (!r)
            return;
          var a = t.body.response;
          if (this.logger.trace("NativeMessageHandler - Received response from browser extension"), this.logger.tracePii("NativeMessageHandler - Received response from browser extension: " + JSON.stringify(a)), a.status !== "Success")
            r.reject(Ie.createError(a.code, a.description, a.ext));
          else if (a.result)
            a.result.code && a.result.description ? r.reject(Ie.createError(a.result.code, a.result.description, a.result.ext)) : r.resolve(a.result);
          else
            throw k.createUnexpectedError("Event does not contain result.");
          this.resolvers.delete(t.responseId);
        } else if (i === ke.HandshakeResponse) {
          if (!o)
            return;
          clearTimeout(this.timeoutId), window.removeEventListener("message", this.windowListener, !1), this.extensionId = t.extensionId, this.extensionVersion = t.body.version, this.logger.verbose("NativeMessageHandler - Received HandshakeResponse from extension: " + this.extensionId), this.handshakeEvent.endMeasurement({ extensionInstalled: !0, success: !0 }), o.resolve(), this.handshakeResolvers.delete(t.responseId);
        }
      } catch (s) {
        this.logger.error("Error parsing response from WAM Extension"), this.logger.errorPii("Error parsing response from WAM Extension: " + s.toString()), this.logger.errorPii("Unable to parse " + e), r ? r.reject(s) : o && o.reject(s);
      }
    }, n.prototype.getExtensionId = function() {
      return this.extensionId;
    }, n.prototype.getExtensionVersion = function() {
      return this.extensionVersion;
    }, n.isNativeAvailable = function(e, t, r, o) {
      if (t.trace("isNativeAvailable called"), !e.system.allowNativeBroker)
        return t.trace("isNativeAvailable: allowNativeBroker is not enabled, returning false"), !1;
      if (!r)
        return t.trace("isNativeAvailable: WAM extension provider is not initialized, returning false"), !1;
      if (o)
        switch (o) {
          case K.BEARER:
          case K.POP:
            return t.trace("isNativeAvailable: authenticationScheme is supported, returning true"), !0;
          default:
            return t.trace("isNativeAvailable: authenticationScheme is not supported, returning false"), !1;
        }
      return !0;
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Mn = (
  /** @class */
  function(n) {
    X(e, n);
    function e(t, r, o, i, a, s, c, u, l, d) {
      var p = n.call(this, t, r, o, i, a, s, c, l, d) || this;
      return p.nativeStorage = u, p;
    }
    return e.prototype.acquireToken = function(t) {
      return v(this, void 0, void 0, function() {
        var r, o, i, a, s, c, u, l, d, p = this;
        return y(this, function(f) {
          switch (f.label) {
            case 0:
              return this.performanceClient.setPreQueueTime(g.StandardInteractionClientInitializeAuthorizationRequest, t.correlationId), [4, this.initializeAuthorizationRequest(t, S.Redirect)];
            case 1:
              r = f.sent(), this.browserStorage.updateCacheEntries(r.state, r.nonce, r.authority, r.loginHint || h.EMPTY_STRING, r.account || null), o = this.initializeServerTelemetryManager(q.acquireTokenRedirect), i = function(m) {
                m.persisted && (p.logger.verbose("Page was restored from back/forward cache. Clearing temporary cache."), p.browserStorage.cleanRequestByState(r.state));
              }, f.label = 2;
            case 2:
              return f.trys.push([2, 7, , 8]), this.performanceClient.setPreQueueTime(g.StandardInteractionClientInitializeAuthorizationCodeRequest, t.correlationId), [4, this.initializeAuthorizationCodeRequest(r)];
            case 3:
              return a = f.sent(), this.performanceClient.setPreQueueTime(g.StandardInteractionClientCreateAuthCodeClient, t.correlationId), [4, this.createAuthCodeClient(o, r.authority, r.azureCloudOptions)];
            case 4:
              return s = f.sent(), this.logger.verbose("Auth code client created"), c = new Er(s, this.browserStorage, a, this.logger, this.browserCrypto, this.performanceClient), [4, s.getAuthCodeUrl(A(A({}, r), { nativeBroker: Ke.isNativeAvailable(this.config, this.logger, this.nativeMessageHandler, t.authenticationScheme) }))];
            case 5:
              return u = f.sent(), l = this.getRedirectStartPage(t.redirectStartPage), this.logger.verbosePii("Redirect start page: " + l), window.addEventListener("pageshow", i), [4, c.initiateAuthRequest(u, {
                navigationClient: this.navigationClient,
                redirectTimeout: this.config.system.redirectNavigationTimeout,
                redirectStartPage: l,
                onRedirectNavigate: t.onRedirectNavigate
              })];
            case 6:
              return [2, f.sent()];
            case 7:
              throw d = f.sent(), d instanceof k && d.setCorrelationId(this.correlationId), window.removeEventListener("pageshow", i), o.cacheFailedRequest(d), this.browserStorage.cleanRequestByState(r.state), d;
            case 8:
              return [
                2
                /*return*/
              ];
          }
        });
      });
    }, e.prototype.handleRedirectPromise = function(t) {
      return v(this, void 0, void 0, function() {
        var r, o, i, a, s, c, u, l, d, p, f, m;
        return y(this, function(C) {
          switch (C.label) {
            case 0:
              r = this.initializeServerTelemetryManager(q.handleRedirectPromise), C.label = 1;
            case 1:
              if (C.trys.push([1, 10, , 11]), !this.browserStorage.isInteractionInProgress(!0))
                return this.logger.info("handleRedirectPromise called but there is no interaction in progress, returning null."), [2, null];
              if (o = this.getRedirectResponseHash(t || window.location.hash), !o)
                return this.logger.info("handleRedirectPromise did not detect a response hash as a result of a redirect. Cleaning temporary cache."), this.browserStorage.cleanRequestByInteractionType(S.Redirect), [2, null];
              i = void 0;
              try {
                a = F.getDeserializedHash(o), i = this.validateAndExtractStateFromHash(a, S.Redirect), this.logger.verbose("State extracted from hash");
              } catch (R) {
                return this.logger.info("handleRedirectPromise was unable to extract state due to: " + R), this.browserStorage.cleanRequestByInteractionType(S.Redirect), [2, null];
              }
              return s = this.browserStorage.getTemporaryCache(x.ORIGIN_URI, !0) || h.EMPTY_STRING, c = F.removeHashFromUrl(s), u = F.removeHashFromUrl(window.location.href), c === u && this.config.auth.navigateToLoginRequestUrl ? (this.logger.verbose("Current page is loginRequestUrl, handling hash"), [4, this.handleHash(o, i, r)]) : [3, 3];
            case 2:
              return l = C.sent(), s.indexOf("#") > -1 && Y.replaceHash(s), [2, l];
            case 3:
              return this.config.auth.navigateToLoginRequestUrl ? [3, 4] : (this.logger.verbose("NavigateToLoginRequestUrl set to false, handling hash"), [2, this.handleHash(o, i, r)]);
            case 4:
              return !Y.isInIframe() || this.config.system.allowRedirectInIframe ? (this.browserStorage.setTemporaryCache(x.URL_HASH, o, !0), d = {
                apiId: q.handleRedirectPromise,
                timeout: this.config.system.redirectNavigationTimeout,
                noHistory: !0
              }, p = !0, !s || s === "null" ? (f = Y.getHomepage(), this.browserStorage.setTemporaryCache(x.ORIGIN_URI, f, !0), this.logger.warning("Unable to get valid login request url from cache, redirecting to home page"), [4, this.navigationClient.navigateInternal(f, d)]) : [3, 6]) : [3, 9];
            case 5:
              return p = C.sent(), [3, 8];
            case 6:
              return this.logger.verbose("Navigating to loginRequestUrl: " + s), [4, this.navigationClient.navigateInternal(s, d)];
            case 7:
              p = C.sent(), C.label = 8;
            case 8:
              if (!p)
                return [2, this.handleHash(o, i, r)];
              C.label = 9;
            case 9:
              return [2, null];
            case 10:
              throw m = C.sent(), m instanceof k && m.setCorrelationId(this.correlationId), r.cacheFailedRequest(m), this.browserStorage.cleanRequestByInteractionType(S.Redirect), m;
            case 11:
              return [
                2
                /*return*/
              ];
          }
        });
      });
    }, e.prototype.getRedirectResponseHash = function(t) {
      this.logger.verbose("getRedirectResponseHash called");
      var r = F.hashContainsKnownProperties(t);
      if (r)
        return Y.clearHash(window), this.logger.verbose("Hash contains known properties, returning response hash"), t;
      var o = this.browserStorage.getTemporaryCache(x.URL_HASH, !0);
      return this.browserStorage.removeItem(this.browserStorage.generateCacheKey(x.URL_HASH)), this.logger.verbose("Hash does not contain known properties, returning cached hash"), o;
    }, e.prototype.handleHash = function(t, r, o) {
      return v(this, void 0, void 0, function() {
        var i, a, s, c, u, l, d, p = this;
        return y(this, function(f) {
          switch (f.label) {
            case 0:
              if (i = this.browserStorage.getCachedRequest(r, this.browserCrypto), this.logger.verbose("handleHash called, retrieved cached request"), a = F.getDeserializedHash(t), a.accountId) {
                if (this.logger.verbose("Account id found in hash, calling WAM for token"), !this.nativeMessageHandler)
                  throw T.createNativeConnectionNotEstablishedError();
                return s = new We(this.config, this.browserStorage, this.browserCrypto, this.logger, this.eventHandler, this.navigationClient, q.acquireTokenPopup, this.performanceClient, this.nativeMessageHandler, a.accountId, this.browserStorage, i.correlationId), c = be.parseRequestState(this.browserCrypto, r).userRequestState, [2, s.acquireToken(A(A({}, i), {
                  state: c,
                  prompt: void 0
                  // Server should handle the prompt, ideally native broker can do this part silently
                })).finally(function() {
                  p.browserStorage.cleanRequestByState(r);
                })];
              }
              if (u = this.browserStorage.getCachedAuthority(r), !u)
                throw T.createNoCachedAuthorityError();
              return this.performanceClient.setPreQueueTime(g.StandardInteractionClientCreateAuthCodeClient, i.correlationId), [4, this.createAuthCodeClient(o, u)];
            case 1:
              return l = f.sent(), this.logger.verbose("Auth code client created"), St.removeThrottle(this.browserStorage, this.config.auth.clientId, i), d = new Er(l, this.browserStorage, i, this.logger, this.browserCrypto, this.performanceClient), [4, d.handleCodeResponseFromHash(t, r, l.authority, this.networkClient)];
            case 2:
              return [2, f.sent()];
          }
        });
      });
    }, e.prototype.logout = function(t) {
      return v(this, void 0, void 0, function() {
        var r, o, i, a, s, c, u;
        return y(this, function(l) {
          switch (l.label) {
            case 0:
              this.logger.verbose("logoutRedirect called"), r = this.initializeLogoutRequest(t), o = this.initializeServerTelemetryManager(q.logout), l.label = 1;
            case 1:
              return l.trys.push([1, 10, , 11]), this.eventHandler.emitEvent(P.LOGOUT_START, S.Redirect, t), [4, this.clearCacheOnLogout(r.account)];
            case 2:
              return l.sent(), i = {
                apiId: q.logout,
                timeout: this.config.system.redirectNavigationTimeout,
                noHistory: !1
              }, this.performanceClient.setPreQueueTime(g.StandardInteractionClientCreateAuthCodeClient, r.correlationId), [4, this.createAuthCodeClient(o, t && t.authority)];
            case 3:
              return a = l.sent(), this.logger.verbose("Auth code client created"), s = a.getLogoutUri(r), this.eventHandler.emitEvent(P.LOGOUT_SUCCESS, S.Redirect, r), t && typeof t.onRedirectNavigate == "function" ? (c = t.onRedirectNavigate(s), c === !1 ? [3, 5] : (this.logger.verbose("Logout onRedirectNavigate did not return false, navigating"), this.browserStorage.getInteractionInProgress() || this.browserStorage.setInteractionInProgress(!0), [4, this.navigationClient.navigateExternal(s, i)])) : [3, 7];
            case 4:
              return l.sent(), [
                2
                /*return*/
              ];
            case 5:
              this.browserStorage.setInteractionInProgress(!1), this.logger.verbose("Logout onRedirectNavigate returned false, stopping navigation"), l.label = 6;
            case 6:
              return [3, 9];
            case 7:
              return this.browserStorage.getInteractionInProgress() || this.browserStorage.setInteractionInProgress(!0), [4, this.navigationClient.navigateExternal(s, i)];
            case 8:
              return l.sent(), [
                2
                /*return*/
              ];
            case 9:
              return [3, 11];
            case 10:
              throw u = l.sent(), u instanceof k && u.setCorrelationId(this.correlationId), o.cacheFailedRequest(u), this.eventHandler.emitEvent(P.LOGOUT_FAILURE, S.Redirect, null, u), this.eventHandler.emitEvent(P.LOGOUT_END, S.Redirect), u;
            case 11:
              return this.eventHandler.emitEvent(P.LOGOUT_END, S.Redirect), [
                2
                /*return*/
              ];
          }
        });
      });
    }, e.prototype.getRedirectStartPage = function(t) {
      var r = t || window.location.href;
      return F.getAbsoluteUrl(r, Y.getCurrentUri());
    }, e;
  }(Ze)
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Pn = (
  /** @class */
  function(n) {
    X(e, n);
    function e(t, r, o, i, a, s, c, u, l, d) {
      var p = n.call(this, t, r, o, i, a, s, c, l, d) || this;
      return p.unloadWindow = p.unloadWindow.bind(p), p.nativeStorage = u, p;
    }
    return e.prototype.acquireToken = function(t) {
      try {
        var r = this.generatePopupName(t.scopes || pt, t.authority || this.config.auth.authority), o = t.popupWindowAttributes || {};
        if (this.config.system.asyncPopups)
          return this.logger.verbose("asyncPopups set to true, acquiring token"), this.acquireTokenPopupAsync(t, r, o);
        this.logger.verbose("asyncPopup set to false, opening popup before acquiring token");
        var i = this.openSizedPopup("about:blank", r, o);
        return this.acquireTokenPopupAsync(t, r, o, i);
      } catch (a) {
        return Promise.reject(a);
      }
    }, e.prototype.logout = function(t) {
      try {
        this.logger.verbose("logoutPopup called");
        var r = this.initializeLogoutRequest(t), o = this.generateLogoutPopupName(r), i = t && t.authority, a = t && t.mainWindowRedirectUri, s = (t == null ? void 0 : t.popupWindowAttributes) || {};
        if (this.config.system.asyncPopups)
          return this.logger.verbose("asyncPopups set to true"), this.logoutPopupAsync(r, o, s, i, void 0, a);
        this.logger.verbose("asyncPopup set to false, opening popup");
        var c = this.openSizedPopup("about:blank", o, s);
        return this.logoutPopupAsync(r, o, s, i, c, a);
      } catch (u) {
        return Promise.reject(u);
      }
    }, e.prototype.acquireTokenPopupAsync = function(t, r, o, i) {
      return v(this, void 0, void 0, function() {
        var a, s, c, u, l, d, p, f, m, C, R, b, N, D, Ee, me, Ne, gt = this;
        return y(this, function(re) {
          switch (re.label) {
            case 0:
              return this.logger.verbose("acquireTokenPopupAsync called"), a = this.initializeServerTelemetryManager(q.acquireTokenPopup), this.performanceClient.setPreQueueTime(g.StandardInteractionClientInitializeAuthorizationRequest, t.correlationId), [4, this.initializeAuthorizationRequest(t, S.Popup)];
            case 1:
              s = re.sent(), this.browserStorage.updateCacheEntries(s.state, s.nonce, s.authority, s.loginHint || h.EMPTY_STRING, s.account || null), re.label = 2;
            case 2:
              return re.trys.push([2, 8, , 9]), this.performanceClient.setPreQueueTime(g.StandardInteractionClientInitializeAuthorizationCodeRequest, t.correlationId), [4, this.initializeAuthorizationCodeRequest(s)];
            case 3:
              return c = re.sent(), this.performanceClient.setPreQueueTime(g.StandardInteractionClientCreateAuthCodeClient, t.correlationId), [4, this.createAuthCodeClient(a, s.authority, s.azureCloudOptions)];
            case 4:
              return u = re.sent(), this.logger.verbose("Auth code client created"), l = Ke.isNativeAvailable(this.config, this.logger, this.nativeMessageHandler, t.authenticationScheme), d = void 0, l && (d = this.performanceClient.startMeasurement(g.FetchAccountIdWithNativeBroker, t.correlationId)), [4, u.getAuthCodeUrl(A(A({}, s), { nativeBroker: l }))];
            case 5:
              return p = re.sent(), f = new tr(u, this.browserStorage, c, this.logger, this.performanceClient), m = {
                popup: i,
                popupName: r,
                popupWindowAttributes: o
              }, C = this.initiateAuthRequest(p, m), this.eventHandler.emitEvent(P.POPUP_OPENED, S.Popup, { popupWindow: C }, null), [4, this.monitorPopupForHash(C)];
            case 6:
              if (R = re.sent(), b = F.getDeserializedHash(R), N = this.validateAndExtractStateFromHash(b, S.Popup, s.correlationId), St.removeThrottle(this.browserStorage, this.config.auth.clientId, c), b.accountId) {
                if (this.logger.verbose("Account id found in hash, calling WAM for token"), d && d.endMeasurement({
                  success: !0,
                  isNativeBroker: !0
                }), !this.nativeMessageHandler)
                  throw T.createNativeConnectionNotEstablishedError();
                return D = new We(this.config, this.browserStorage, this.browserCrypto, this.logger, this.eventHandler, this.navigationClient, q.acquireTokenPopup, this.performanceClient, this.nativeMessageHandler, b.accountId, this.nativeStorage, s.correlationId), Ee = be.parseRequestState(this.browserCrypto, N).userRequestState, [2, D.acquireToken(A(A({}, s), {
                  state: Ee,
                  prompt: void 0
                  // Server should handle the prompt, ideally native broker can do this part silently
                })).finally(function() {
                  gt.browserStorage.cleanRequestByState(N);
                })];
              }
              return [4, f.handleCodeResponseFromHash(R, N, u.authority, this.networkClient)];
            case 7:
              return me = re.sent(), [2, me];
            case 8:
              throw Ne = re.sent(), i && i.close(), Ne instanceof k && Ne.setCorrelationId(this.correlationId), a.cacheFailedRequest(Ne), this.browserStorage.cleanRequestByState(s.state), Ne;
            case 9:
              return [
                2
                /*return*/
              ];
          }
        });
      });
    }, e.prototype.logoutPopupAsync = function(t, r, o, i, a, s) {
      return v(this, void 0, void 0, function() {
        var c, u, l, d, p, f, m;
        return y(this, function(C) {
          switch (C.label) {
            case 0:
              this.logger.verbose("logoutPopupAsync called"), this.eventHandler.emitEvent(P.LOGOUT_START, S.Popup, t), c = this.initializeServerTelemetryManager(q.logoutPopup), C.label = 1;
            case 1:
              return C.trys.push([1, 5, , 6]), [4, this.clearCacheOnLogout(t.account)];
            case 2:
              return C.sent(), this.performanceClient.setPreQueueTime(g.StandardInteractionClientCreateAuthCodeClient, t.correlationId), [4, this.createAuthCodeClient(c, i)];
            case 3:
              return u = C.sent(), this.logger.verbose("Auth code client created"), l = u.getLogoutUri(t), this.eventHandler.emitEvent(P.LOGOUT_SUCCESS, S.Popup, t), d = this.openPopup(l, { popupName: r, popupWindowAttributes: o, popup: a }), this.eventHandler.emitEvent(P.POPUP_OPENED, S.Popup, { popupWindow: d }, null), [4, this.waitForLogoutPopup(d)];
            case 4:
              return C.sent(), s ? (p = {
                apiId: q.logoutPopup,
                timeout: this.config.system.redirectNavigationTimeout,
                noHistory: !1
              }, f = F.getAbsoluteUrl(s, Y.getCurrentUri()), this.logger.verbose("Redirecting main window to url specified in the request"), this.logger.verbosePii("Redirecting main window to: " + f), this.navigationClient.navigateInternal(f, p)) : this.logger.verbose("No main window navigation requested"), [3, 6];
            case 5:
              throw m = C.sent(), a && a.close(), m instanceof k && m.setCorrelationId(this.correlationId), this.browserStorage.setInteractionInProgress(!1), this.eventHandler.emitEvent(P.LOGOUT_FAILURE, S.Popup, null, m), this.eventHandler.emitEvent(P.LOGOUT_END, S.Popup), c.cacheFailedRequest(m), m;
            case 6:
              return this.eventHandler.emitEvent(P.LOGOUT_END, S.Popup), [
                2
                /*return*/
              ];
          }
        });
      });
    }, e.prototype.initiateAuthRequest = function(t, r) {
      if (I.isEmpty(t))
        throw this.logger.error("Navigate url is empty"), T.createEmptyNavigationUriError();
      return this.logger.infoPii("Navigate to: " + t), this.openPopup(t, r);
    }, e.prototype.monitorPopupForHash = function(t) {
      var r = this;
      return new Promise(function(o, i) {
        var a = r.config.system.windowHashTimeout / r.config.system.pollIntervalMilliseconds, s = 0;
        r.logger.verbose("PopupHandler.monitorPopupForHash - polling started");
        var c = setInterval(function() {
          if (t.closed) {
            r.logger.error("PopupHandler.monitorPopupForHash - window closed"), r.cleanPopup(), clearInterval(c), i(T.createUserCancelledError());
            return;
          }
          var u = h.EMPTY_STRING, l = h.EMPTY_STRING;
          try {
            u = t.location.href, l = t.location.hash;
          } catch {
          }
          I.isEmpty(u) || u === "about:blank" || (r.logger.verbose("PopupHandler.monitorPopupForHash - popup window is on same origin as caller"), s++, l ? (r.logger.verbose("PopupHandler.monitorPopupForHash - found hash in url"), clearInterval(c), r.cleanPopup(t), F.hashContainsKnownProperties(l) ? (r.logger.verbose("PopupHandler.monitorPopupForHash - hash contains known properties, returning."), o(l)) : (r.logger.error("PopupHandler.monitorPopupForHash - found hash in url but it does not contain known properties. Check that your router is not changing the hash prematurely."), r.logger.errorPii("PopupHandler.monitorPopupForHash - hash found: " + l), i(T.createHashDoesNotContainKnownPropertiesError()))) : s > a && (r.logger.error("PopupHandler.monitorPopupForHash - unable to find hash in url, timing out"), clearInterval(c), i(T.createMonitorPopupTimeoutError())));
        }, r.config.system.pollIntervalMilliseconds);
      });
    }, e.prototype.waitForLogoutPopup = function(t) {
      var r = this;
      return new Promise(function(o) {
        r.logger.verbose("PopupHandler.waitForLogoutPopup - polling started");
        var i = setInterval(function() {
          t.closed && (r.logger.error("PopupHandler.waitForLogoutPopup - window closed"), r.cleanPopup(), clearInterval(i), o());
          var a = h.EMPTY_STRING;
          try {
            a = t.location.href;
          } catch {
          }
          I.isEmpty(a) || a === "about:blank" || (r.logger.verbose("PopupHandler.waitForLogoutPopup - popup window is on same origin as caller, closing."), clearInterval(i), r.cleanPopup(t), o());
        }, r.config.system.pollIntervalMilliseconds);
      });
    }, e.prototype.openPopup = function(t, r) {
      try {
        var o = void 0;
        if (r.popup ? (o = r.popup, this.logger.verbosePii("Navigating popup window to: " + t), o.location.assign(t)) : typeof r.popup > "u" && (this.logger.verbosePii("Opening popup window to: " + t), o = this.openSizedPopup(t, r.popupName, r.popupWindowAttributes)), !o)
          throw T.createEmptyWindowCreatedError();
        return o.focus && o.focus(), this.currentWindow = o, window.addEventListener("beforeunload", this.unloadWindow), o;
      } catch (i) {
        throw this.logger.error("error opening popup " + i.message), this.browserStorage.setInteractionInProgress(!1), T.createPopupWindowError(i.toString());
      }
    }, e.prototype.openSizedPopup = function(t, r, o) {
      var i, a, s, c, u = window.screenLeft ? window.screenLeft : window.screenX, l = window.screenTop ? window.screenTop : window.screenY, d = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth, p = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight, f = (i = o.popupSize) === null || i === void 0 ? void 0 : i.width, m = (a = o.popupSize) === null || a === void 0 ? void 0 : a.height, C = (s = o.popupPosition) === null || s === void 0 ? void 0 : s.top, R = (c = o.popupPosition) === null || c === void 0 ? void 0 : c.left;
      return (!f || f < 0 || f > d) && (this.logger.verbose("Default popup window width used. Window width not configured or invalid."), f = ve.POPUP_WIDTH), (!m || m < 0 || m > p) && (this.logger.verbose("Default popup window height used. Window height not configured or invalid."), m = ve.POPUP_HEIGHT), (!C || C < 0 || C > p) && (this.logger.verbose("Default popup window top position used. Window top not configured or invalid."), C = Math.max(0, p / 2 - ve.POPUP_HEIGHT / 2 + l)), (!R || R < 0 || R > d) && (this.logger.verbose("Default popup window left position used. Window left not configured or invalid."), R = Math.max(0, d / 2 - ve.POPUP_WIDTH / 2 + u)), window.open(t, r, "width=" + f + ", height=" + m + ", top=" + C + ", left=" + R + ", scrollbars=yes");
    }, e.prototype.unloadWindow = function(t) {
      this.browserStorage.cleanRequestByInteractionType(S.Popup), this.currentWindow && this.currentWindow.close(), t.preventDefault();
    }, e.prototype.cleanPopup = function(t) {
      t && t.close(), window.removeEventListener("beforeunload", this.unloadWindow), this.browserStorage.setInteractionInProgress(!1);
    }, e.prototype.generatePopupName = function(t, r) {
      return ve.POPUP_NAME_PREFIX + "." + this.config.auth.clientId + "." + t.join("-") + "." + r + "." + this.correlationId;
    }, e.prototype.generateLogoutPopupName = function(t) {
      var r = t.account && t.account.homeAccountId;
      return ve.POPUP_NAME_PREFIX + "." + this.config.auth.clientId + "." + r + "." + this.correlationId;
    }, e;
  }(Ze)
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var On = (
  /** @class */
  function() {
    function n() {
    }
    return n.prototype.navigateInternal = function(e, t) {
      return n.defaultNavigateWindow(e, t);
    }, n.prototype.navigateExternal = function(e, t) {
      return n.defaultNavigateWindow(e, t);
    }, n.defaultNavigateWindow = function(e, t) {
      return t.noHistory ? window.location.replace(e) : window.location.assign(e), new Promise(function(r) {
        setTimeout(function() {
          r(!0);
        }, t.timeout);
      });
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Un = 6e4, Qt = 6e3, Hn = 3e4, Ln = 2e3;
function Dn(n, e) {
  var t = n.auth, r = n.cache, o = n.system, i = n.telemetry, a = {
    clientId: h.EMPTY_STRING,
    authority: "" + h.DEFAULT_AUTHORITY,
    knownAuthorities: [],
    cloudDiscoveryMetadata: h.EMPTY_STRING,
    authorityMetadata: h.EMPTY_STRING,
    redirectUri: h.EMPTY_STRING,
    postLogoutRedirectUri: h.EMPTY_STRING,
    navigateToLoginRequestUrl: !0,
    clientCapabilities: [],
    protocolMode: bt.AAD,
    azureCloudOptions: {
      azureCloudInstance: lt.None,
      tenant: h.EMPTY_STRING
    },
    skipAuthorityMetadataCache: !1
  }, s = {
    cacheLocation: Q.SessionStorage,
    temporaryCacheLocation: Q.SessionStorage,
    storeAuthStateInCookie: !1,
    secureCookies: !1,
    // Default cache migration to true if cache location is localStorage since entries are preserved across tabs/windows. Migration has little to no benefit in sessionStorage and memoryStorage
    cacheMigrationEnabled: !!(r && r.cacheLocation === Q.LocalStorage)
  }, c = {
    // eslint-disable-next-line @typescript-eslint/no-empty-function
    loggerCallback: function() {
    },
    logLevel: z.Info,
    piiLoggingEnabled: !1
  }, u = A(A({}, Dr), {
    loggerOptions: c,
    networkClient: e ? Y.getBrowserNetworkClient() : Tn,
    navigationClient: new On(),
    loadFrameTimeout: 0,
    // If loadFrameTimeout is provided, use that as default.
    windowHashTimeout: (o == null ? void 0 : o.loadFrameTimeout) || Un,
    iframeHashTimeout: (o == null ? void 0 : o.loadFrameTimeout) || Qt,
    navigateFrameWait: e && Y.detectIEOrEdge() ? 500 : 0,
    redirectNavigationTimeout: Hn,
    asyncPopups: !1,
    allowRedirectInIframe: !1,
    allowNativeBroker: !1,
    nativeBrokerHandshakeTimeout: (o == null ? void 0 : o.nativeBrokerHandshakeTimeout) || Ln,
    pollIntervalMilliseconds: ve.DEFAULT_POLL_INTERVAL_MS,
    cryptoOptions: {
      useMsrCrypto: !1,
      entropy: void 0
    }
  }), l = A(A({}, o), { loggerOptions: (o == null ? void 0 : o.loggerOptions) || c }), d = {
    application: {
      appName: h.EMPTY_STRING,
      appVersion: h.EMPTY_STRING
    }
  }, p = {
    auth: A(A({}, a), t),
    cache: A(A({}, s), r),
    system: A(A({}, u), l),
    telemetry: A(A({}, d), i)
  };
  return p;
}
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Yr = (
  /** @class */
  function(n) {
    X(e, n);
    function e(t, r, o, i, a, s) {
      var c = n.call(this, t, r, o, i, s) || this;
      return c.navigateFrameWait = a.navigateFrameWait, c.pollIntervalMilliseconds = a.pollIntervalMilliseconds, c;
    }
    return e.prototype.initiateAuthRequest = function(t) {
      return v(this, void 0, void 0, function() {
        return y(this, function(r) {
          switch (r.label) {
            case 0:
              if (this.performanceClient.addQueueMeasurement(g.SilentHandlerInitiateAuthRequest, this.authCodeRequest.correlationId), I.isEmpty(t))
                throw this.logger.info("Navigate url is empty"), T.createEmptyNavigationUriError();
              return this.navigateFrameWait ? (this.performanceClient.setPreQueueTime(g.SilentHandlerLoadFrame, this.authCodeRequest.correlationId), [4, this.loadFrame(t)]) : [3, 2];
            case 1:
              return [2, r.sent()];
            case 2:
              return [2, this.loadFrameSync(t)];
          }
        });
      });
    }, e.prototype.monitorIframeForHash = function(t, r) {
      var o = this;
      return this.performanceClient.addQueueMeasurement(g.SilentHandlerMonitorIframeForHash, this.authCodeRequest.correlationId), new Promise(function(i, a) {
        r < Qt && o.logger.warning("system.loadFrameTimeout or system.iframeHashTimeout set to lower (" + r + "ms) than the default (" + Qt + "ms). This may result in timeouts.");
        var s = window.performance.now(), c = s + r, u = setInterval(function() {
          if (window.performance.now() > c) {
            o.removeHiddenIframe(t), clearInterval(u), a(T.createMonitorIframeTimeoutError());
            return;
          }
          var l = h.EMPTY_STRING, d = t.contentWindow;
          try {
            l = d ? d.location.href : h.EMPTY_STRING;
          } catch {
          }
          if (!I.isEmpty(l)) {
            var p = d ? d.location.hash : h.EMPTY_STRING;
            if (F.hashContainsKnownProperties(p)) {
              o.removeHiddenIframe(t), clearInterval(u), i(p);
              return;
            }
          }
        }, o.pollIntervalMilliseconds);
      });
    }, e.prototype.loadFrame = function(t) {
      var r = this;
      return this.performanceClient.addQueueMeasurement(g.SilentHandlerLoadFrame, this.authCodeRequest.correlationId), new Promise(function(o, i) {
        var a = r.createHiddenIframe();
        setTimeout(function() {
          if (!a) {
            i("Unable to load iframe");
            return;
          }
          a.src = t, o(a);
        }, r.navigateFrameWait);
      });
    }, e.prototype.loadFrameSync = function(t) {
      var r = this.createHiddenIframe();
      return r.src = t, r;
    }, e.prototype.createHiddenIframe = function() {
      var t = document.createElement("iframe");
      return t.style.visibility = "hidden", t.style.position = "absolute", t.style.width = t.style.height = "0", t.style.border = "0", t.setAttribute("sandbox", "allow-scripts allow-same-origin allow-forms"), document.getElementsByTagName("body")[0].appendChild(t), t;
    }, e.prototype.removeHiddenIframe = function(t) {
      document.body === t.parentNode && document.body.removeChild(t);
    }, e;
  }(tr)
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Fn = (
  /** @class */
  function(n) {
    X(e, n);
    function e(t, r, o, i, a, s, c, u, l, d, p) {
      var f = n.call(this, t, r, o, i, a, s, u, d, p) || this;
      return f.apiId = c, f.nativeStorage = l, f;
    }
    return e.prototype.acquireToken = function(t) {
      return v(this, void 0, void 0, function() {
        var r, o, i, a, s;
        return y(this, function(c) {
          switch (c.label) {
            case 0:
              if (this.performanceClient.addQueueMeasurement(g.SilentIframeClientAcquireToken, t.correlationId), this.logger.verbose("acquireTokenByIframe called"), r = this.performanceClient.startMeasurement(g.SilentIframeClientAcquireToken, t.correlationId), I.isEmpty(t.loginHint) && I.isEmpty(t.sid) && (!t.account || I.isEmpty(t.account.username)) && this.logger.warning("No user hint provided. The authorization server may need more information to complete this request."), t.prompt && t.prompt !== ee.NONE && t.prompt !== ee.NO_SESSION)
                throw r.endMeasurement({
                  success: !1
                }), T.createSilentPromptValueError(t.prompt);
              return this.performanceClient.setPreQueueTime(g.StandardInteractionClientInitializeAuthorizationRequest, t.correlationId), [4, this.initializeAuthorizationRequest(A(A({}, t), { prompt: t.prompt || ee.NONE }), S.Silent)];
            case 1:
              o = c.sent(), this.browserStorage.updateCacheEntries(o.state, o.nonce, o.authority, o.loginHint || h.EMPTY_STRING, o.account || null), i = this.initializeServerTelemetryManager(this.apiId), c.label = 2;
            case 2:
              return c.trys.push([2, 5, , 6]), this.performanceClient.setPreQueueTime(g.StandardInteractionClientCreateAuthCodeClient, t.correlationId), [4, this.createAuthCodeClient(i, o.authority, o.azureCloudOptions)];
            case 3:
              return a = c.sent(), this.logger.verbose("Auth code client created"), this.performanceClient.setPreQueueTime(g.SilentIframeClientTokenHelper, t.correlationId), [4, this.silentTokenHelper(a, o).then(function(u) {
                return r.endMeasurement({
                  success: !0,
                  fromCache: !1,
                  requestId: u.requestId
                }), u;
              })];
            case 4:
              return [2, c.sent()];
            case 5:
              throw s = c.sent(), s instanceof k && s.setCorrelationId(this.correlationId), i.cacheFailedRequest(s), this.browserStorage.cleanRequestByState(o.state), r.endMeasurement({
                errorCode: s instanceof k && s.errorCode || void 0,
                subErrorCode: s instanceof k && s.subError || void 0,
                success: !1
              }), s;
            case 6:
              return [
                2
                /*return*/
              ];
          }
        });
      });
    }, e.prototype.logout = function() {
      return Promise.reject(T.createSilentLogoutUnsupportedError());
    }, e.prototype.silentTokenHelper = function(t, r) {
      return v(this, void 0, void 0, function() {
        var o, i, a, s, c, u, l, d, p, f = this;
        return y(this, function(m) {
          switch (m.label) {
            case 0:
              return this.performanceClient.addQueueMeasurement(g.SilentIframeClientTokenHelper, r.correlationId), this.performanceClient.setPreQueueTime(g.StandardInteractionClientInitializeAuthorizationCodeRequest, r.correlationId), [4, this.initializeAuthorizationCodeRequest(r)];
            case 1:
              return o = m.sent(), this.performanceClient.setPreQueueTime(g.GetAuthCodeUrl, r.correlationId), [4, t.getAuthCodeUrl(A(A({}, r), { nativeBroker: Ke.isNativeAvailable(this.config, this.logger, this.nativeMessageHandler, r.authenticationScheme) }))];
            case 2:
              return i = m.sent(), a = new Yr(t, this.browserStorage, o, this.logger, this.config.system, this.performanceClient), this.performanceClient.setPreQueueTime(g.SilentHandlerInitiateAuthRequest, r.correlationId), [4, a.initiateAuthRequest(i)];
            case 3:
              return s = m.sent(), this.performanceClient.setPreQueueTime(g.SilentHandlerMonitorIframeForHash, r.correlationId), [4, a.monitorIframeForHash(s, this.config.system.iframeHashTimeout)];
            case 4:
              if (c = m.sent(), u = F.getDeserializedHash(c), l = this.validateAndExtractStateFromHash(u, S.Silent, o.correlationId), u.accountId) {
                if (this.logger.verbose("Account id found in hash, calling WAM for token"), !this.nativeMessageHandler)
                  throw T.createNativeConnectionNotEstablishedError();
                return d = new We(this.config, this.browserStorage, this.browserCrypto, this.logger, this.eventHandler, this.navigationClient, this.apiId, this.performanceClient, this.nativeMessageHandler, u.accountId, this.browserStorage, this.correlationId), p = be.parseRequestState(this.browserCrypto, l).userRequestState, [2, d.acquireToken(A(A({}, r), { state: p, prompt: r.prompt || ee.NONE })).finally(function() {
                  f.browserStorage.cleanRequestByState(l);
                })];
              }
              return this.performanceClient.setPreQueueTime(g.HandleCodeResponseFromHash, r.correlationId), [2, a.handleCodeResponseFromHash(c, l, t.authority, this.networkClient)];
          }
        });
      });
    }, e;
  }(Ze)
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var xn = (
  /** @class */
  function(n) {
    X(e, n);
    function e() {
      return n !== null && n.apply(this, arguments) || this;
    }
    return e.prototype.acquireToken = function(t) {
      return v(this, void 0, void 0, function() {
        var r, o, i, a, s, c = this;
        return y(this, function(u) {
          switch (u.label) {
            case 0:
              return this.performanceClient.addQueueMeasurement(g.SilentRefreshClientAcquireToken, t.correlationId), this.performanceClient.setPreQueueTime(g.InitializeBaseRequest, t.correlationId), o = [A({}, t)], [4, this.initializeBaseRequest(t)];
            case 1:
              return r = A.apply(void 0, o.concat([u.sent()])), i = this.performanceClient.startMeasurement(g.SilentRefreshClientAcquireToken, r.correlationId), a = this.initializeServerTelemetryManager(q.acquireTokenSilent_silentFlow), [4, this.createRefreshTokenClient(a, r.authority, r.azureCloudOptions)];
            case 2:
              return s = u.sent(), this.logger.verbose("Refresh token client created"), this.performanceClient.setPreQueueTime(g.RefreshTokenClientAcquireTokenByRefreshToken, t.correlationId), [2, s.acquireTokenByRefreshToken(r).then(function(l) {
                return i.endMeasurement({
                  success: !0,
                  fromCache: l.fromCache,
                  requestId: l.requestId
                }), l;
              }).catch(function(l) {
                throw l instanceof k && l.setCorrelationId(c.correlationId), a.cacheFailedRequest(l), i.endMeasurement({
                  errorCode: l.errorCode,
                  subErrorCode: l.subError,
                  success: !1
                }), l;
              })];
          }
        });
      });
    }, e.prototype.logout = function() {
      return Promise.reject(T.createSilentLogoutUnsupportedError());
    }, e.prototype.createRefreshTokenClient = function(t, r, o) {
      return v(this, void 0, void 0, function() {
        var i;
        return y(this, function(a) {
          switch (a.label) {
            case 0:
              return this.performanceClient.setPreQueueTime(g.StandardInteractionClientGetClientConfiguration, this.correlationId), [4, this.getClientConfiguration(t, r, o)];
            case 1:
              return i = a.sent(), [2, new xr(i, this.performanceClient)];
          }
        });
      });
    }, e;
  }(Ze)
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Kn = (
  /** @class */
  function() {
    function n(e, t) {
      this.eventCallbacks = /* @__PURE__ */ new Map(), this.logger = e, this.browserCrypto = t, this.listeningToStorageEvents = !1, this.handleAccountCacheChange = this.handleAccountCacheChange.bind(this);
    }
    return n.prototype.addEventCallback = function(e) {
      if (typeof window < "u") {
        var t = this.browserCrypto.createNewGuid();
        return this.eventCallbacks.set(t, e), this.logger.verbose("Event callback registered with id: " + t), t;
      }
      return null;
    }, n.prototype.removeEventCallback = function(e) {
      this.eventCallbacks.delete(e), this.logger.verbose("Event callback " + e + " removed.");
    }, n.prototype.enableAccountStorageEvents = function() {
      typeof window > "u" || (this.listeningToStorageEvents ? this.logger.verbose("Account storage listener already registered.") : (this.logger.verbose("Adding account storage listener."), this.listeningToStorageEvents = !0, window.addEventListener("storage", this.handleAccountCacheChange)));
    }, n.prototype.disableAccountStorageEvents = function() {
      typeof window > "u" || (this.listeningToStorageEvents ? (this.logger.verbose("Removing account storage listener."), window.removeEventListener("storage", this.handleAccountCacheChange), this.listeningToStorageEvents = !1) : this.logger.verbose("No account storage listener registered."));
    }, n.prototype.emitEvent = function(e, t, r, o) {
      var i = this;
      if (typeof window < "u") {
        var a = {
          eventType: e,
          interactionType: t || null,
          payload: r || null,
          error: o || null,
          timestamp: Date.now()
        };
        this.logger.info("Emitting event: " + e), this.eventCallbacks.forEach(function(s, c) {
          i.logger.verbose("Emitting event to callback " + c + ": " + e), s.apply(null, [a]);
        });
      }
    }, n.prototype.handleAccountCacheChange = function(e) {
      try {
        var t = e.newValue || e.oldValue;
        if (!t)
          return;
        var r = JSON.parse(t);
        if (typeof r != "object" || !J.isAccountEntity(r))
          return;
        var o = ae.toObject(new J(), r), i = o.getAccountInfo();
        !e.oldValue && e.newValue ? (this.logger.info("Account was added to cache in a different window"), this.emitEvent(P.ACCOUNT_ADDED, void 0, i)) : !e.newValue && e.oldValue && (this.logger.info("Account was removed from cache in a different window"), this.emitEvent(P.ACCOUNT_REMOVED, void 0, i));
      } catch {
        return;
      }
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var $ = (
  /** @class */
  function() {
    function n() {
    }
    return n.decimalToHex = function(e) {
      for (var t = e.toString(16); t.length < 2; )
        t = "0" + t;
      return t;
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Qr = (
  /** @class */
  function() {
    function n(e) {
      this.cryptoObj = e;
    }
    return n.prototype.generateGuid = function() {
      try {
        var e = new Uint8Array(16);
        return this.cryptoObj.getRandomValues(e), e[6] |= 64, e[6] &= 79, e[8] |= 128, e[8] &= 191, $.decimalToHex(e[0]) + $.decimalToHex(e[1]) + $.decimalToHex(e[2]) + $.decimalToHex(e[3]) + "-" + $.decimalToHex(e[4]) + $.decimalToHex(e[5]) + "-" + $.decimalToHex(e[6]) + $.decimalToHex(e[7]) + "-" + $.decimalToHex(e[8]) + $.decimalToHex(e[9]) + "-" + $.decimalToHex(e[10]) + $.decimalToHex(e[11]) + $.decimalToHex(e[12]) + $.decimalToHex(e[13]) + $.decimalToHex(e[14]) + $.decimalToHex(e[15]);
      } catch {
        for (var t = "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx", r = "0123456789abcdef", o = 0, i = h.EMPTY_STRING, a = 0; a < 36; a++)
          t[a] !== "-" && t[a] !== "4" && (o = Math.random() * 16 | 0), t[a] === "x" ? i += r[o] : t[a] === "y" ? (o &= 3, o |= 8, i += r[o]) : i += t[a];
        return i;
      }
    }, n.prototype.isGuid = function(e) {
      var t = /^[0-9a-f]{8}-[0-9a-f]{4}-[1-5][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i;
      return t.test(e);
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Re = (
  /** @class */
  function() {
    function n() {
    }
    return n.stringToUtf8Arr = function(e) {
      for (var t, r = 0, o = e.length, i = 0; i < o; i++)
        t = e.charCodeAt(i), r += t < 128 ? 1 : t < 2048 ? 2 : t < 65536 ? 3 : t < 2097152 ? 4 : t < 67108864 ? 5 : 6;
      for (var a = new Uint8Array(r), s = 0, c = 0; s < r; c++)
        t = e.charCodeAt(c), t < 128 ? a[s++] = t : t < 2048 ? (a[s++] = 192 + (t >>> 6), a[s++] = 128 + (t & 63)) : t < 65536 ? (a[s++] = 224 + (t >>> 12), a[s++] = 128 + (t >>> 6 & 63), a[s++] = 128 + (t & 63)) : t < 2097152 ? (a[s++] = 240 + (t >>> 18), a[s++] = 128 + (t >>> 12 & 63), a[s++] = 128 + (t >>> 6 & 63), a[s++] = 128 + (t & 63)) : t < 67108864 ? (a[s++] = 248 + (t >>> 24), a[s++] = 128 + (t >>> 18 & 63), a[s++] = 128 + (t >>> 12 & 63), a[s++] = 128 + (t >>> 6 & 63), a[s++] = 128 + (t & 63)) : (a[s++] = 252 + (t >>> 30), a[s++] = 128 + (t >>> 24 & 63), a[s++] = 128 + (t >>> 18 & 63), a[s++] = 128 + (t >>> 12 & 63), a[s++] = 128 + (t >>> 6 & 63), a[s++] = 128 + (t & 63));
      return a;
    }, n.stringToArrayBuffer = function(e) {
      for (var t = new ArrayBuffer(e.length), r = new Uint8Array(t), o = 0; o < e.length; o++)
        r[o] = e.charCodeAt(o);
      return t;
    }, n.utf8ArrToString = function(e) {
      for (var t = h.EMPTY_STRING, r = void 0, o = e.length, i = 0; i < o; i++)
        r = e[i], t += String.fromCharCode(r > 251 && r < 254 && i + 5 < o ? (
          /* six bytes */
          /* (nPart - 252 << 30) may be not so safe in ECMAScript! So...: */
          (r - 252) * 1073741824 + (e[++i] - 128 << 24) + (e[++i] - 128 << 18) + (e[++i] - 128 << 12) + (e[++i] - 128 << 6) + e[++i] - 128
        ) : r > 247 && r < 252 && i + 4 < o ? (
          /* five bytes */
          (r - 248 << 24) + (e[++i] - 128 << 18) + (e[++i] - 128 << 12) + (e[++i] - 128 << 6) + e[++i] - 128
        ) : r > 239 && r < 248 && i + 3 < o ? (
          /* four bytes */
          (r - 240 << 18) + (e[++i] - 128 << 12) + (e[++i] - 128 << 6) + e[++i] - 128
        ) : r > 223 && r < 240 && i + 2 < o ? (
          /* three bytes */
          (r - 224 << 12) + (e[++i] - 128 << 6) + e[++i] - 128
        ) : r > 191 && r < 224 && i + 1 < o ? (
          /* two bytes */
          (r - 192 << 6) + e[++i] - 128
        ) : (
          /* nPart < 127 ? */
          /* one byte */
          r
        ));
      return t;
    }, n.getSortedObjectString = function(e) {
      return JSON.stringify(e, Object.keys(e).sort());
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var jr = (
  /** @class */
  function() {
    function n() {
    }
    return n.prototype.urlEncode = function(e) {
      return encodeURIComponent(this.encode(e).replace(/=/g, h.EMPTY_STRING).replace(/\+/g, "-").replace(/\//g, "_"));
    }, n.prototype.urlEncodeArr = function(e) {
      return this.base64EncArr(e).replace(/=/g, h.EMPTY_STRING).replace(/\+/g, "-").replace(/\//g, "_");
    }, n.prototype.encode = function(e) {
      var t = Re.stringToUtf8Arr(e);
      return this.base64EncArr(t);
    }, n.prototype.base64EncArr = function(e) {
      for (var t = (3 - e.length % 3) % 3, r = h.EMPTY_STRING, o = void 0, i = e.length, a = 0, s = 0; s < i; s++)
        o = s % 3, a |= e[s] << (16 >>> o & 24), (o === 2 || e.length - s === 1) && (r += String.fromCharCode(this.uint6ToB64(a >>> 18 & 63), this.uint6ToB64(a >>> 12 & 63), this.uint6ToB64(a >>> 6 & 63), this.uint6ToB64(a & 63)), a = 0);
      return t === 0 ? r : r.substring(0, r.length - t) + (t === 1 ? "=" : "==");
    }, n.prototype.uint6ToB64 = function(e) {
      return e < 26 ? e + 65 : e < 52 ? e + 71 : e < 62 ? e - 4 : e === 62 ? 43 : e === 63 ? 47 : 65;
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Bn = (
  /** @class */
  function() {
    function n() {
    }
    return n.prototype.decode = function(e) {
      var t = e.replace(/-/g, "+").replace(/_/g, "/");
      switch (t.length % 4) {
        case 0:
          break;
        case 2:
          t += "==";
          break;
        case 3:
          t += "=";
          break;
        default:
          throw new Error("Invalid base64 string");
      }
      var r = this.base64DecToArr(t);
      return Re.utf8ArrToString(r);
    }, n.prototype.base64DecToArr = function(e, t) {
      for (var r = e.replace(/[^A-Za-z0-9\+\/]/g, h.EMPTY_STRING), o = r.length, i = t ? Math.ceil((o * 3 + 1 >>> 2) / t) * t : o * 3 + 1 >>> 2, a = new Uint8Array(i), s = void 0, c = void 0, u = 0, l = 0, d = 0; d < o; d++)
        if (c = d & 3, u |= this.b64ToUint6(r.charCodeAt(d)) << 18 - 6 * c, c === 3 || o - d === 1) {
          for (s = 0; s < 3 && l < i; s++, l++)
            a[l] = u >>> (16 >>> s & 24) & 255;
          u = 0;
        }
      return a;
    }, n.prototype.b64ToUint6 = function(e) {
      return e > 64 && e < 91 ? e - 65 : e > 96 && e < 123 ? e - 71 : e > 47 && e < 58 ? e + 4 : e === 43 ? 62 : e === 47 ? 63 : 0;
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var qn = 32, Gn = (
  /** @class */
  function() {
    function n(e) {
      this.base64Encode = new jr(), this.cryptoObj = e;
    }
    return n.prototype.generateCodes = function() {
      return v(this, void 0, void 0, function() {
        var e, t;
        return y(this, function(r) {
          switch (r.label) {
            case 0:
              return e = this.generateCodeVerifier(), [4, this.generateCodeChallengeFromVerifier(e)];
            case 1:
              return t = r.sent(), [2, {
                verifier: e,
                challenge: t
              }];
          }
        });
      });
    }, n.prototype.generateCodeVerifier = function() {
      try {
        var e = new Uint8Array(qn);
        this.cryptoObj.getRandomValues(e);
        var t = this.base64Encode.urlEncodeArr(e);
        return t;
      } catch (r) {
        throw T.createPkceNotGeneratedError(r);
      }
    }, n.prototype.generateCodeChallengeFromVerifier = function(e) {
      return v(this, void 0, void 0, function() {
        var t, r;
        return y(this, function(o) {
          switch (o.label) {
            case 0:
              return o.trys.push([0, 2, , 3]), [4, this.cryptoObj.sha256Digest(e)];
            case 1:
              return t = o.sent(), [2, this.base64Encode.urlEncodeArr(new Uint8Array(t))];
            case 2:
              throw r = o.sent(), T.createPkceNotGeneratedError(r);
            case 3:
              return [
                2
                /*return*/
              ];
          }
        });
      });
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var zn = (
  /** @class */
  function() {
    function n() {
    }
    return n.prototype.getRandomValues = function(e) {
      return window.crypto.getRandomValues(e);
    }, n.prototype.generateKey = function(e, t, r) {
      return v(this, void 0, void 0, function() {
        return y(this, function(o) {
          return [2, window.crypto.subtle.generateKey(e, t, r)];
        });
      });
    }, n.prototype.exportKey = function(e) {
      return v(this, void 0, void 0, function() {
        return y(this, function(t) {
          return [2, window.crypto.subtle.exportKey($e, e)];
        });
      });
    }, n.prototype.importKey = function(e, t, r, o) {
      return v(this, void 0, void 0, function() {
        return y(this, function(i) {
          return [2, window.crypto.subtle.importKey($e, e, t, r, o)];
        });
      });
    }, n.prototype.sign = function(e, t, r) {
      return v(this, void 0, void 0, function() {
        return y(this, function(o) {
          return [2, window.crypto.subtle.sign(e, t, r)];
        });
      });
    }, n.prototype.digest = function(e, t) {
      return v(this, void 0, void 0, function() {
        return y(this, function(r) {
          return [2, window.crypto.subtle.digest(e, t)];
        });
      });
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Yn = (
  /** @class */
  function() {
    function n() {
    }
    return n.prototype.initPrng = function(e) {
      return window.msrCrypto.initPrng(Jt(e));
    }, n.prototype.getRandomValues = function(e) {
      return window.msrCrypto.getRandomValues(e);
    }, n.prototype.generateKey = function(e, t, r) {
      return v(this, void 0, void 0, function() {
        return y(this, function(o) {
          return [2, window.msrCrypto.subtle.generateKey(e, t, r)];
        });
      });
    }, n.prototype.exportKey = function(e) {
      return v(this, void 0, void 0, function() {
        return y(this, function(t) {
          return [2, window.msrCrypto.subtle.exportKey($e, e)];
        });
      });
    }, n.prototype.importKey = function(e, t, r, o) {
      return v(this, void 0, void 0, function() {
        return y(this, function(i) {
          return [2, window.msrCrypto.subtle.importKey($e, e, t, r, o)];
        });
      });
    }, n.prototype.sign = function(e, t, r) {
      return v(this, void 0, void 0, function() {
        return y(this, function(o) {
          return [2, window.msrCrypto.subtle.sign(e, t, r)];
        });
      });
    }, n.prototype.digest = function(e, t) {
      return v(this, void 0, void 0, function() {
        return y(this, function(r) {
          return [2, window.msrCrypto.subtle.digest(e, t)];
        });
      });
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Qn = (
  /** @class */
  function() {
    function n() {
    }
    return n.prototype.getRandomValues = function(e) {
      return window.msCrypto.getRandomValues(e);
    }, n.prototype.generateKey = function(e, t, r) {
      return v(this, void 0, void 0, function() {
        return y(this, function(o) {
          return [2, new Promise(function(i, a) {
            var s = window.msCrypto.subtle.generateKey(e, t, r);
            s.addEventListener("complete", function(c) {
              i(c.target.result);
            }), s.addEventListener("error", function(c) {
              a(c);
            });
          })];
        });
      });
    }, n.prototype.exportKey = function(e) {
      return v(this, void 0, void 0, function() {
        return y(this, function(t) {
          return [2, new Promise(function(r, o) {
            var i = window.msCrypto.subtle.exportKey($e, e);
            i.addEventListener("complete", function(a) {
              var s = a.target.result, c = Re.utf8ArrToString(new Uint8Array(s)).replace(/\r/g, h.EMPTY_STRING).replace(/\n/g, h.EMPTY_STRING).replace(/\t/g, h.EMPTY_STRING).split(" ").join(h.EMPTY_STRING).replace("\0", h.EMPTY_STRING);
              try {
                r(JSON.parse(c));
              } catch (u) {
                o(u);
              }
            }), i.addEventListener("error", function(a) {
              o(a);
            });
          })];
        });
      });
    }, n.prototype.importKey = function(e, t, r, o) {
      return v(this, void 0, void 0, function() {
        var i, a;
        return y(this, function(s) {
          return i = Re.getSortedObjectString(e), a = Re.stringToArrayBuffer(i), [2, new Promise(function(c, u) {
            var l = window.msCrypto.subtle.importKey($e, a, t, r, o);
            l.addEventListener("complete", function(d) {
              c(d.target.result);
            }), l.addEventListener("error", function(d) {
              u(d);
            });
          })];
        });
      });
    }, n.prototype.sign = function(e, t, r) {
      return v(this, void 0, void 0, function() {
        return y(this, function(o) {
          return [2, new Promise(function(i, a) {
            var s = window.msCrypto.subtle.sign(e, t, r);
            s.addEventListener("complete", function(c) {
              i(c.target.result);
            }), s.addEventListener("error", function(c) {
              a(c);
            });
          })];
        });
      });
    }, n.prototype.digest = function(e, t) {
      return v(this, void 0, void 0, function() {
        return y(this, function(r) {
          return [2, new Promise(function(o, i) {
            var a = window.msCrypto.subtle.digest(e, t.buffer);
            a.addEventListener("complete", function(s) {
              o(s.target.result);
            }), a.addEventListener("error", function(s) {
              i(s);
            });
          })];
        });
      });
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var jn = "RSASSA-PKCS1-v1_5", _r = "SHA-256", Vn = 2048, Wn = new Uint8Array([1, 0, 1]), Vr = (
  /** @class */
  function() {
    function n(e, t) {
      var r, o;
      if (this.logger = e, this.cryptoOptions = t, this.hasBrowserCrypto())
        this.logger.verbose("BrowserCrypto: modern crypto interface available"), this.subtleCrypto = new zn();
      else if (this.hasIECrypto())
        this.logger.verbose("BrowserCrypto: MS crypto interface available"), this.subtleCrypto = new Qn();
      else if (this.hasMsrCrypto() && (!((r = this.cryptoOptions) === null || r === void 0) && r.useMsrCrypto))
        this.logger.verbose("BrowserCrypto: MSR crypto interface available"), this.subtleCrypto = new Yn();
      else
        throw this.hasMsrCrypto() && this.logger.info("BrowserCrypto: MSR Crypto interface available but system.cryptoOptions.useMsrCrypto not enabled"), this.logger.error("BrowserCrypto: No crypto interfaces available."), T.createCryptoNotAvailableError("Browser crypto, msCrypto, or msrCrypto interfaces not available.");
      if (this.subtleCrypto.initPrng) {
        if (this.logger.verbose("BrowserCrypto: Interface requires entropy"), !(!((o = this.cryptoOptions) === null || o === void 0) && o.entropy))
          throw this.logger.error("BrowserCrypto: Interface requires entropy but none provided."), Mt.createEntropyNotProvided();
        this.logger.verbose("BrowserCrypto: Entropy provided"), this.subtleCrypto.initPrng(this.cryptoOptions.entropy);
      }
      this.keygenAlgorithmOptions = {
        name: jn,
        hash: _r,
        modulusLength: Vn,
        publicExponent: Wn
      };
    }
    return n.prototype.hasIECrypto = function() {
      return "msCrypto" in window;
    }, n.prototype.hasBrowserCrypto = function() {
      return "crypto" in window;
    }, n.prototype.hasMsrCrypto = function() {
      return "msrCrypto" in window;
    }, n.prototype.sha256Digest = function(e) {
      return v(this, void 0, void 0, function() {
        var t;
        return y(this, function(r) {
          return t = Re.stringToUtf8Arr(e), [2, this.subtleCrypto.digest({ name: _r }, t)];
        });
      });
    }, n.prototype.getRandomValues = function(e) {
      return this.subtleCrypto.getRandomValues(e);
    }, n.prototype.generateKeyPair = function(e, t) {
      return v(this, void 0, void 0, function() {
        return y(this, function(r) {
          return [2, this.subtleCrypto.generateKey(this.keygenAlgorithmOptions, e, t)];
        });
      });
    }, n.prototype.exportJwk = function(e) {
      return v(this, void 0, void 0, function() {
        return y(this, function(t) {
          return [2, this.subtleCrypto.exportKey(e)];
        });
      });
    }, n.prototype.importJwk = function(e, t, r) {
      return v(this, void 0, void 0, function() {
        return y(this, function(o) {
          return [2, this.subtleCrypto.importKey(e, this.keygenAlgorithmOptions, t, r)];
        });
      });
    }, n.prototype.sign = function(e, t) {
      return v(this, void 0, void 0, function() {
        return y(this, function(r) {
          return [2, this.subtleCrypto.sign(this.keygenAlgorithmOptions, e, t)];
        });
      });
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Jn = (
  /** @class */
  function() {
    function n() {
      this.dbName = Gt, this.version = An, this.tableName = kn, this.dbOpen = !1;
    }
    return n.prototype.open = function() {
      return v(this, void 0, void 0, function() {
        var e = this;
        return y(this, function(t) {
          return [2, new Promise(function(r, o) {
            var i = window.indexedDB.open(e.dbName, e.version);
            i.addEventListener("upgradeneeded", function(a) {
              var s = a;
              s.target.result.createObjectStore(e.tableName);
            }), i.addEventListener("success", function(a) {
              var s = a;
              e.db = s.target.result, e.dbOpen = !0, r();
            }), i.addEventListener("error", function() {
              return o(T.createDatabaseUnavailableError());
            });
          })];
        });
      });
    }, n.prototype.closeConnection = function() {
      var e = this.db;
      e && this.dbOpen && (e.close(), this.dbOpen = !1);
    }, n.prototype.validateDbIsOpen = function() {
      return v(this, void 0, void 0, function() {
        return y(this, function(e) {
          switch (e.label) {
            case 0:
              return this.dbOpen ? [3, 2] : [4, this.open()];
            case 1:
              return [2, e.sent()];
            case 2:
              return [
                2
                /*return*/
              ];
          }
        });
      });
    }, n.prototype.getItem = function(e) {
      return v(this, void 0, void 0, function() {
        var t = this;
        return y(this, function(r) {
          switch (r.label) {
            case 0:
              return [4, this.validateDbIsOpen()];
            case 1:
              return r.sent(), [2, new Promise(function(o, i) {
                if (!t.db)
                  return i(T.createDatabaseNotOpenError());
                var a = t.db.transaction([t.tableName], "readonly"), s = a.objectStore(t.tableName), c = s.get(e);
                c.addEventListener("success", function(u) {
                  var l = u;
                  t.closeConnection(), o(l.target.result);
                }), c.addEventListener("error", function(u) {
                  t.closeConnection(), i(u);
                });
              })];
          }
        });
      });
    }, n.prototype.setItem = function(e, t) {
      return v(this, void 0, void 0, function() {
        var r = this;
        return y(this, function(o) {
          switch (o.label) {
            case 0:
              return [4, this.validateDbIsOpen()];
            case 1:
              return o.sent(), [2, new Promise(function(i, a) {
                if (!r.db)
                  return a(T.createDatabaseNotOpenError());
                var s = r.db.transaction([r.tableName], "readwrite"), c = s.objectStore(r.tableName), u = c.put(t, e);
                u.addEventListener("success", function() {
                  r.closeConnection(), i();
                }), u.addEventListener("error", function(l) {
                  r.closeConnection(), a(l);
                });
              })];
          }
        });
      });
    }, n.prototype.removeItem = function(e) {
      return v(this, void 0, void 0, function() {
        var t = this;
        return y(this, function(r) {
          switch (r.label) {
            case 0:
              return [4, this.validateDbIsOpen()];
            case 1:
              return r.sent(), [2, new Promise(function(o, i) {
                if (!t.db)
                  return i(T.createDatabaseNotOpenError());
                var a = t.db.transaction([t.tableName], "readwrite"), s = a.objectStore(t.tableName), c = s.delete(e);
                c.addEventListener("success", function() {
                  t.closeConnection(), o();
                }), c.addEventListener("error", function(u) {
                  t.closeConnection(), i(u);
                });
              })];
          }
        });
      });
    }, n.prototype.getKeys = function() {
      return v(this, void 0, void 0, function() {
        var e = this;
        return y(this, function(t) {
          switch (t.label) {
            case 0:
              return [4, this.validateDbIsOpen()];
            case 1:
              return t.sent(), [2, new Promise(function(r, o) {
                if (!e.db)
                  return o(T.createDatabaseNotOpenError());
                var i = e.db.transaction([e.tableName], "readonly"), a = i.objectStore(e.tableName), s = a.getAllKeys();
                s.addEventListener("success", function(c) {
                  var u = c;
                  e.closeConnection(), r(u.target.result);
                }), s.addEventListener("error", function(c) {
                  e.closeConnection(), o(c);
                });
              })];
          }
        });
      });
    }, n.prototype.containsKey = function(e) {
      return v(this, void 0, void 0, function() {
        var t = this;
        return y(this, function(r) {
          switch (r.label) {
            case 0:
              return [4, this.validateDbIsOpen()];
            case 1:
              return r.sent(), [2, new Promise(function(o, i) {
                if (!t.db)
                  return i(T.createDatabaseNotOpenError());
                var a = t.db.transaction([t.tableName], "readonly"), s = a.objectStore(t.tableName), c = s.count(e);
                c.addEventListener("success", function(u) {
                  var l = u;
                  t.closeConnection(), o(l.target.result === 1);
                }), c.addEventListener("error", function(u) {
                  t.closeConnection(), i(u);
                });
              })];
          }
        });
      });
    }, n.prototype.deleteDatabase = function() {
      return v(this, void 0, void 0, function() {
        return y(this, function(e) {
          return this.db && this.dbOpen && this.closeConnection(), [2, new Promise(function(t, r) {
            var o = window.indexedDB.deleteDatabase(Gt);
            o.addEventListener("success", function() {
              return t(!0);
            }), o.addEventListener("blocked", function() {
              return t(!0);
            }), o.addEventListener("error", function() {
              return r(!1);
            });
          })];
        });
      });
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Tr = (
  /** @class */
  function() {
    function n(e, t) {
      this.inMemoryCache = new zt(), this.indexedDBCache = new Jn(), this.logger = e, this.storeName = t;
    }
    return n.prototype.handleDatabaseAccessError = function(e) {
      if (e instanceof T && e.errorCode === E.databaseUnavailable.code)
        this.logger.error("Could not access persistent storage. This may be caused by browser privacy features which block persistent storage in third-party contexts.");
      else
        throw e;
    }, n.prototype.getItem = function(e) {
      return v(this, void 0, void 0, function() {
        var t, r;
        return y(this, function(o) {
          switch (o.label) {
            case 0:
              if (t = this.inMemoryCache.getItem(e), t)
                return [3, 4];
              o.label = 1;
            case 1:
              return o.trys.push([1, 3, , 4]), this.logger.verbose("Queried item not found in in-memory cache, now querying persistent storage."), [4, this.indexedDBCache.getItem(e)];
            case 2:
              return [2, o.sent()];
            case 3:
              return r = o.sent(), this.handleDatabaseAccessError(r), [3, 4];
            case 4:
              return [2, t];
          }
        });
      });
    }, n.prototype.setItem = function(e, t) {
      return v(this, void 0, void 0, function() {
        var r;
        return y(this, function(o) {
          switch (o.label) {
            case 0:
              this.inMemoryCache.setItem(e, t), o.label = 1;
            case 1:
              return o.trys.push([1, 3, , 4]), [4, this.indexedDBCache.setItem(e, t)];
            case 2:
              return o.sent(), [3, 4];
            case 3:
              return r = o.sent(), this.handleDatabaseAccessError(r), [3, 4];
            case 4:
              return [
                2
                /*return*/
              ];
          }
        });
      });
    }, n.prototype.removeItem = function(e) {
      return v(this, void 0, void 0, function() {
        var t;
        return y(this, function(r) {
          switch (r.label) {
            case 0:
              this.inMemoryCache.removeItem(e), r.label = 1;
            case 1:
              return r.trys.push([1, 3, , 4]), [4, this.indexedDBCache.removeItem(e)];
            case 2:
              return r.sent(), [3, 4];
            case 3:
              return t = r.sent(), this.handleDatabaseAccessError(t), [3, 4];
            case 4:
              return [
                2
                /*return*/
              ];
          }
        });
      });
    }, n.prototype.getKeys = function() {
      return v(this, void 0, void 0, function() {
        var e, t;
        return y(this, function(r) {
          switch (r.label) {
            case 0:
              if (e = this.inMemoryCache.getKeys(), e.length !== 0)
                return [3, 4];
              r.label = 1;
            case 1:
              return r.trys.push([1, 3, , 4]), this.logger.verbose("In-memory cache is empty, now querying persistent storage."), [4, this.indexedDBCache.getKeys()];
            case 2:
              return [2, r.sent()];
            case 3:
              return t = r.sent(), this.handleDatabaseAccessError(t), [3, 4];
            case 4:
              return [2, e];
          }
        });
      });
    }, n.prototype.containsKey = function(e) {
      return v(this, void 0, void 0, function() {
        var t, r;
        return y(this, function(o) {
          switch (o.label) {
            case 0:
              if (t = this.inMemoryCache.containsKey(e), t)
                return [3, 4];
              o.label = 1;
            case 1:
              return o.trys.push([1, 3, , 4]), this.logger.verbose("Key not found in in-memory cache, now querying persistent storage."), [4, this.indexedDBCache.containsKey(e)];
            case 2:
              return [2, o.sent()];
            case 3:
              return r = o.sent(), this.handleDatabaseAccessError(r), [3, 4];
            case 4:
              return [2, t];
          }
        });
      });
    }, n.prototype.clearInMemory = function() {
      this.logger.verbose("Deleting in-memory keystore " + this.storeName), this.inMemoryCache.clear(), this.logger.verbose("In-memory keystore " + this.storeName + " deleted");
    }, n.prototype.clearPersistent = function() {
      return v(this, void 0, void 0, function() {
        var e, t;
        return y(this, function(r) {
          switch (r.label) {
            case 0:
              return r.trys.push([0, 2, , 3]), this.logger.verbose("Deleting persistent keystore"), [4, this.indexedDBCache.deleteDatabase()];
            case 1:
              return e = r.sent(), e && this.logger.verbose("Persistent keystore deleted"), [2, e];
            case 2:
              return t = r.sent(), this.handleDatabaseAccessError(t), [2, !1];
            case 3:
              return [
                2
                /*return*/
              ];
          }
        });
      });
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Pt;
(function(n) {
  n.asymmetricKeys = "asymmetricKeys", n.symmetricKeys = "symmetricKeys";
})(Pt || (Pt = {}));
var Xn = (
  /** @class */
  function() {
    function n(e) {
      this.logger = e, this.asymmetricKeys = new Tr(this.logger, Pt.asymmetricKeys), this.symmetricKeys = new Tr(this.logger, Pt.symmetricKeys);
    }
    return n.prototype.clear = function() {
      return v(this, void 0, void 0, function() {
        var e;
        return y(this, function(t) {
          switch (t.label) {
            case 0:
              this.asymmetricKeys.clearInMemory(), this.symmetricKeys.clearInMemory(), t.label = 1;
            case 1:
              return t.trys.push([1, 3, , 4]), [4, this.asymmetricKeys.clearPersistent()];
            case 2:
              return t.sent(), [2, !0];
            case 3:
              return e = t.sent(), e instanceof Error ? this.logger.error("Clearing keystore failed with error: " + e.message) : this.logger.error("Clearing keystore failed with unknown error"), [2, !1];
            case 4:
              return [
                2
                /*return*/
              ];
          }
        });
      });
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var $n = (
  /** @class */
  function() {
    function n(e, t, r) {
      this.logger = e, this.browserCrypto = new Vr(this.logger, r), this.b64Encode = new jr(), this.b64Decode = new Bn(), this.guidGenerator = new Qr(this.browserCrypto), this.pkceGenerator = new Gn(this.browserCrypto), this.cache = new Xn(this.logger), this.performanceClient = t;
    }
    return n.prototype.createNewGuid = function() {
      return this.guidGenerator.generateGuid();
    }, n.prototype.base64Encode = function(e) {
      return this.b64Encode.encode(e);
    }, n.prototype.base64Decode = function(e) {
      return this.b64Decode.decode(e);
    }, n.prototype.generatePkceCodes = function() {
      return v(this, void 0, void 0, function() {
        return y(this, function(e) {
          return [2, this.pkceGenerator.generateCodes()];
        });
      });
    }, n.prototype.getPublicKeyThumbprint = function(e) {
      var t;
      return v(this, void 0, void 0, function() {
        var r, o, i, a, s, c, u, l;
        return y(this, function(d) {
          switch (d.label) {
            case 0:
              return r = (t = this.performanceClient) === null || t === void 0 ? void 0 : t.startMeasurement(g.CryptoOptsGetPublicKeyThumbprint, e.correlationId), [4, this.browserCrypto.generateKeyPair(n.EXTRACTABLE, n.POP_KEY_USAGES)];
            case 1:
              return o = d.sent(), [4, this.browserCrypto.exportJwk(o.publicKey)];
            case 2:
              return i = d.sent(), a = {
                e: i.e,
                kty: i.kty,
                n: i.n
              }, s = Re.getSortedObjectString(a), [4, this.hashString(s)];
            case 3:
              return c = d.sent(), [4, this.browserCrypto.exportJwk(o.privateKey)];
            case 4:
              return u = d.sent(), [4, this.browserCrypto.importJwk(u, !1, ["sign"])];
            case 5:
              return l = d.sent(), [4, this.cache.asymmetricKeys.setItem(c, {
                privateKey: l,
                publicKey: o.publicKey,
                requestMethod: e.resourceRequestMethod,
                requestUri: e.resourceRequestUri
              })];
            case 6:
              return d.sent(), r && r.endMeasurement({
                success: !0
              }), [2, c];
          }
        });
      });
    }, n.prototype.removeTokenBindingKey = function(e) {
      return v(this, void 0, void 0, function() {
        var t;
        return y(this, function(r) {
          switch (r.label) {
            case 0:
              return [4, this.cache.asymmetricKeys.removeItem(e)];
            case 1:
              return r.sent(), [4, this.cache.asymmetricKeys.containsKey(e)];
            case 2:
              return t = r.sent(), [2, !t];
          }
        });
      });
    }, n.prototype.clearKeystore = function() {
      return v(this, void 0, void 0, function() {
        return y(this, function(e) {
          switch (e.label) {
            case 0:
              return [4, this.cache.clear()];
            case 1:
              return [2, e.sent()];
          }
        });
      });
    }, n.prototype.signJwt = function(e, t, r) {
      var o;
      return v(this, void 0, void 0, function() {
        var i, a, s, c, u, l, d, p, f, m, C, R, b;
        return y(this, function(N) {
          switch (N.label) {
            case 0:
              return i = (o = this.performanceClient) === null || o === void 0 ? void 0 : o.startMeasurement(g.CryptoOptsSignJwt, r), [4, this.cache.asymmetricKeys.getItem(t)];
            case 1:
              if (a = N.sent(), !a)
                throw T.createSigningKeyNotFoundInStorageError(t);
              return [4, this.browserCrypto.exportJwk(a.publicKey)];
            case 2:
              return s = N.sent(), c = Re.getSortedObjectString(s), u = this.b64Encode.urlEncode(JSON.stringify({ kid: t })), l = In.getShrHeaderString({ kid: u, alg: s.alg }), d = this.b64Encode.urlEncode(l), e.cnf = {
                jwk: JSON.parse(c)
              }, p = this.b64Encode.urlEncode(JSON.stringify(e)), f = d + "." + p, m = Re.stringToArrayBuffer(f), [4, this.browserCrypto.sign(a.privateKey, m)];
            case 3:
              return C = N.sent(), R = this.b64Encode.urlEncodeArr(new Uint8Array(C)), b = f + "." + R, i && i.endMeasurement({
                success: !0
              }), [2, b];
          }
        });
      });
    }, n.prototype.hashString = function(e) {
      return v(this, void 0, void 0, function() {
        var t, r;
        return y(this, function(o) {
          switch (o.label) {
            case 0:
              return [4, this.browserCrypto.sha256Digest(e)];
            case 1:
              return t = o.sent(), r = new Uint8Array(t), [2, this.b64Encode.urlEncodeArr(r)];
          }
        });
      });
    }, n.POP_KEY_USAGES = ["sign", "verify"], n.EXTRACTABLE = !0, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Ir = (
  /** @class */
  function() {
    function n(e, t) {
      this.correlationId = t, this.measureName = n.makeMeasureName(e, t), this.startMark = n.makeStartMark(e, t), this.endMark = n.makeEndMark(e, t);
    }
    return n.makeMeasureName = function(e, t) {
      return "msal.measure." + e + "." + t;
    }, n.makeStartMark = function(e, t) {
      return "msal.start." + e + "." + t;
    }, n.makeEndMark = function(e, t) {
      return "msal.end." + e + "." + t;
    }, n.supportsBrowserPerformance = function() {
      return typeof window < "u" && typeof window.performance < "u" && typeof window.performance.mark == "function" && typeof window.performance.measure == "function" && typeof window.performance.clearMarks == "function" && typeof window.performance.clearMeasures == "function" && typeof window.performance.getEntriesByName == "function";
    }, n.flushMeasurements = function(e, t) {
      if (n.supportsBrowserPerformance())
        try {
          t.forEach(function(r) {
            var o = n.makeMeasureName(r.name, e), i = window.performance.getEntriesByName(o, "measure");
            i.length > 0 && (window.performance.clearMeasures(o), window.performance.clearMarks(n.makeStartMark(o, e)), window.performance.clearMarks(n.makeEndMark(o, e)));
          });
        } catch {
        }
    }, n.prototype.startMeasurement = function() {
      if (n.supportsBrowserPerformance())
        try {
          window.performance.mark(this.startMark);
        } catch {
        }
    }, n.prototype.endMeasurement = function() {
      if (n.supportsBrowserPerformance())
        try {
          window.performance.mark(this.endMark), window.performance.measure(this.measureName, this.startMark, this.endMark);
        } catch {
        }
    }, n.prototype.flushMeasurement = function() {
      if (n.supportsBrowserPerformance())
        try {
          var e = window.performance.getEntriesByName(this.measureName, "measure");
          if (e.length > 0) {
            var t = e[0].duration;
            return window.performance.clearMeasures(this.measureName), window.performance.clearMarks(this.startMark), window.performance.clearMarks(this.endMark), t;
          }
        } catch {
        }
      return null;
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var Zn = (
  /** @class */
  function(n) {
    X(e, n);
    function e(t, r, o, i, a, s, c) {
      var u = n.call(this, t, r, o, i, a, s) || this;
      return u.browserCrypto = new Vr(u.logger, c), u.guidGenerator = new Qr(u.browserCrypto), u;
    }
    return e.prototype.startPerformanceMeasuremeant = function(t, r) {
      return new Ir(t, r);
    }, e.prototype.generateId = function() {
      return this.guidGenerator.generateGuid();
    }, e.prototype.getPageVisibility = function() {
      var t;
      return ((t = document.visibilityState) === null || t === void 0 ? void 0 : t.toString()) || null;
    }, e.prototype.deleteIncompleteSubMeasurements = function(t) {
      var r = this.eventsByCorrelationId.get(t.event.correlationId), o = r && r.eventId === t.event.eventId, i = [];
      o && (r != null && r.incompleteSubMeasurements) && r.incompleteSubMeasurements.forEach(function(a) {
        i.push(A({}, a));
      }), i.length > 0 && Ir.flushMeasurements(t.event.correlationId, i);
    }, e.prototype.supportsBrowserPerformanceNow = function() {
      return typeof window < "u" && typeof window.performance < "u" && typeof window.performance.now == "function";
    }, e.prototype.startMeasurement = function(t, r) {
      var o = this, i = this.getPageVisibility(), a = n.prototype.startMeasurement.call(this, t, r);
      return A(A({}, a), { endMeasurement: function(s) {
        var c = a.endMeasurement(A({ startPageVisibility: i, endPageVisibility: o.getPageVisibility() }, s));
        return o.deleteIncompleteSubMeasurements(a), c;
      }, discardMeasurement: function() {
        a.discardMeasurement(), o.deleteIncompleteSubMeasurements(a), a.measurement.flushMeasurement();
      } });
    }, e.prototype.setPreQueueTime = function(t, r) {
      if (!this.supportsBrowserPerformanceNow()) {
        this.logger.trace("BrowserPerformanceClient: window performance API not available, unable to set telemetry queue time for " + t);
        return;
      }
      if (!r) {
        this.logger.trace("BrowserPerformanceClient: correlationId for " + t + " not provided, unable to set telemetry queue time");
        return;
      }
      var o = this.preQueueTimeByCorrelationId.get(r);
      o && (this.logger.trace("BrowserPerformanceClient: Incomplete pre-queue " + o.name + " found", r), this.addQueueMeasurement(o.name, r, void 0, !0)), this.preQueueTimeByCorrelationId.set(r, { name: t, time: window.performance.now() });
    }, e.prototype.addQueueMeasurement = function(t, r, o, i) {
      if (!this.supportsBrowserPerformanceNow()) {
        this.logger.trace("BrowserPerformanceClient: window performance API not available, unable to add queue measurement for " + t);
        return;
      }
      if (!r) {
        this.logger.trace("BrowserPerformanceClient: correlationId for " + t + " not provided, unable to add queue measurement");
        return;
      }
      var a = n.prototype.getPreQueueTime.call(this, t, r);
      if (a) {
        var s = window.performance.now(), c = o || n.prototype.calculateQueuedTime.call(this, a, s);
        return n.prototype.addQueueMeasurement.call(this, t, r, c, i);
      }
    }, e;
  }(Br)
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var eo = (
  /** @class */
  function() {
    function n(e, t, r, o) {
      this.isBrowserEnvironment = typeof window < "u", this.config = e, this.storage = t, this.logger = r, this.cryptoObj = o;
    }
    return n.prototype.loadExternalTokens = function(e, t, r) {
      if (this.logger.info("TokenCache - loadExternalTokens called"), !t.id_token)
        throw T.createUnableToLoadTokenError("Please ensure server response includes id token.");
      var o = new we(t.id_token, this.cryptoObj), i, a;
      if (e.account) {
        var s = this.loadAccount(o, e.account.environment, void 0, void 0, e.account.homeAccountId);
        i = new yt(s, this.loadIdToken(o, s.homeAccountId, e.account.environment, e.account.tenantId), this.loadAccessToken(e, t, s.homeAccountId, e.account.environment, e.account.tenantId, r), this.loadRefreshToken(e, t, s.homeAccountId, e.account.environment));
      } else if (e.authority) {
        var c = dt.generateAuthority(e.authority, e.azureCloudOptions), u = {
          protocolMode: this.config.auth.protocolMode,
          knownAuthorities: this.config.auth.knownAuthorities,
          cloudDiscoveryMetadata: this.config.auth.cloudDiscoveryMetadata,
          authorityMetadata: this.config.auth.authorityMetadata,
          skipAuthorityMetadataCache: this.config.auth.skipAuthorityMetadataCache
        };
        if (a = new dt(c, this.config.system.networkClient, this.storage, u, this.logger), r.clientInfo) {
          this.logger.trace("TokenCache - homeAccountId from options");
          var s = this.loadAccount(o, a.hostnameAndPort, r.clientInfo, a.authorityType);
          i = new yt(s, this.loadIdToken(o, s.homeAccountId, a.hostnameAndPort, a.tenant), this.loadAccessToken(e, t, s.homeAccountId, a.hostnameAndPort, a.tenant, r), this.loadRefreshToken(e, t, s.homeAccountId, a.hostnameAndPort));
        } else if (t.client_info) {
          this.logger.trace("TokenCache - homeAccountId from response");
          var s = this.loadAccount(o, a.hostnameAndPort, t.client_info, a.authorityType);
          i = new yt(s, this.loadIdToken(o, s.homeAccountId, a.hostnameAndPort, a.tenant), this.loadAccessToken(e, t, s.homeAccountId, a.hostnameAndPort, a.tenant, r), this.loadRefreshToken(e, t, s.homeAccountId, a.hostnameAndPort));
        } else
          throw T.createUnableToLoadTokenError("Please provide clientInfo in the response or options.");
      } else
        throw T.createUnableToLoadTokenError("Please provide a request with an account or a request with authority.");
      return this.generateAuthenticationResult(e, o, i, a);
    }, n.prototype.loadAccount = function(e, t, r, o, i) {
      var a;
      if (i ? a = i : o !== void 0 && r && (a = J.generateHomeAccountId(r, o, this.logger, this.cryptoObj, e)), !a)
        throw T.createUnableToLoadTokenError("Unexpected missing homeAccountId");
      var s = r ? J.createAccount(r, a, e, void 0, void 0, void 0, t) : J.createGenericAccount(a, e, void 0, void 0, void 0, t);
      if (this.isBrowserEnvironment)
        return this.logger.verbose("TokenCache - loading account"), this.storage.setAccount(s), s;
      throw T.createUnableToLoadTokenError("loadExternalTokens is designed to work in browser environments only.");
    }, n.prototype.loadIdToken = function(e, t, r, o) {
      var i = Fe.createIdTokenEntity(t, r, e.rawToken, this.config.auth.clientId, o);
      if (this.isBrowserEnvironment)
        return this.logger.verbose("TokenCache - loading id token"), this.storage.setIdTokenCredential(i), i;
      throw T.createUnableToLoadTokenError("loadExternalTokens is designed to work in browser environments only.");
    }, n.prototype.loadAccessToken = function(e, t, r, o, i, a) {
      if (!t.access_token)
        return this.logger.verbose("TokenCache - No access token provided for caching"), null;
      if (!t.expires_in)
        throw T.createUnableToLoadTokenError("Please ensure server response includes expires_in value.");
      if (!a.extendedExpiresOn)
        throw T.createUnableToLoadTokenError("Please provide an extendedExpiresOn value in the options.");
      var s = new Z(e.scopes).printScopes(), c = a.expiresOn || t.expires_in + (/* @__PURE__ */ new Date()).getTime() / 1e3, u = a.extendedExpiresOn, l = xe.createAccessTokenEntity(r, o, t.access_token, this.config.auth.clientId, i, s, c, u, this.cryptoObj);
      if (this.isBrowserEnvironment)
        return this.logger.verbose("TokenCache - loading access token"), this.storage.setAccessTokenCredential(l), l;
      throw T.createUnableToLoadTokenError("loadExternalTokens is designed to work in browser environments only.");
    }, n.prototype.loadRefreshToken = function(e, t, r, o) {
      if (!t.refresh_token)
        return this.logger.verbose("TokenCache - No refresh token provided for caching"), null;
      var i = je.createRefreshTokenEntity(r, o, t.refresh_token, this.config.auth.clientId);
      if (this.isBrowserEnvironment)
        return this.logger.verbose("TokenCache - loading refresh token"), this.storage.setRefreshTokenCredential(i), i;
      throw T.createUnableToLoadTokenError("loadExternalTokens is designed to work in browser environments only.");
    }, n.prototype.generateAuthenticationResult = function(e, t, r, o) {
      var i, a, s, c = h.EMPTY_STRING, u = [], l = null, d;
      r != null && r.accessToken && (c = r.accessToken.secret, u = Z.fromString(r.accessToken.target).asArray(), l = new Date(Number(r.accessToken.expiresOn) * 1e3), d = new Date(Number(r.accessToken.extendedExpiresOn) * 1e3));
      var p = (t == null ? void 0 : t.claims.oid) || (t == null ? void 0 : t.claims.sub) || h.EMPTY_STRING, f = (t == null ? void 0 : t.claims.tid) || h.EMPTY_STRING;
      return {
        authority: o ? o.canonicalAuthority : h.EMPTY_STRING,
        uniqueId: p,
        tenantId: f,
        scopes: u,
        account: r != null && r.account ? r.account.getAccountInfo() : null,
        idToken: t ? t.rawToken : h.EMPTY_STRING,
        idTokenClaims: t ? t.claims : {},
        accessToken: c,
        fromCache: !0,
        expiresOn: l,
        correlationId: e.correlationId || h.EMPTY_STRING,
        requestId: h.EMPTY_STRING,
        extExpiresOn: d,
        familyId: h.EMPTY_STRING,
        tokenType: ((i = r == null ? void 0 : r.accessToken) === null || i === void 0 ? void 0 : i.tokenType) || h.EMPTY_STRING,
        state: h.EMPTY_STRING,
        cloudGraphHostName: ((a = r == null ? void 0 : r.account) === null || a === void 0 ? void 0 : a.cloudGraphHostName) || h.EMPTY_STRING,
        msGraphHost: ((s = r == null ? void 0 : r.account) === null || s === void 0 ? void 0 : s.msGraphHost) || h.EMPTY_STRING,
        code: void 0,
        fromNativeBroker: !1
      };
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var to = (
  /** @class */
  function(n) {
    X(e, n);
    function e(t) {
      var r = n.call(this, t) || this;
      return r.includeRedirectUri = !1, r;
    }
    return e;
  }(Fr)
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var ro = (
  /** @class */
  function(n) {
    X(e, n);
    function e(t, r, o, i, a, s, c, u, l, d) {
      var p = n.call(this, t, r, o, i, a, s, u, l, d) || this;
      return p.apiId = c, p;
    }
    return e.prototype.acquireToken = function(t) {
      return v(this, void 0, void 0, function() {
        var r, o, i, a, s, c, u;
        return y(this, function(l) {
          switch (l.label) {
            case 0:
              if (this.logger.trace("SilentAuthCodeClient.acquireToken called"), !t.code)
                throw T.createAuthCodeRequiredError();
              return this.performanceClient.setPreQueueTime(g.StandardInteractionClientInitializeAuthorizationRequest, t.correlationId), [4, this.initializeAuthorizationRequest(t, S.Silent)];
            case 1:
              r = l.sent(), this.browserStorage.updateCacheEntries(r.state, r.nonce, r.authority, r.loginHint || h.EMPTY_STRING, r.account || null), o = this.initializeServerTelemetryManager(this.apiId), l.label = 2;
            case 2:
              return l.trys.push([2, 4, , 5]), i = A(A({}, r), { code: t.code }), this.performanceClient.setPreQueueTime(g.StandardInteractionClientGetClientConfiguration, t.correlationId), [4, this.getClientConfiguration(o, r.authority)];
            case 3:
              return a = l.sent(), s = new to(a), this.logger.verbose("Auth code client created"), c = new Yr(s, this.browserStorage, i, this.logger, this.config.system, this.performanceClient), [2, c.handleCodeResponseFromServer({
                code: t.code,
                msgraph_host: t.msGraphHost,
                cloud_graph_host_name: t.cloudGraphHostName,
                cloud_instance_host_name: t.cloudInstanceHostName
              }, r.state, s.authority, this.networkClient, !1)];
            case 4:
              throw u = l.sent(), u instanceof k && u.setCorrelationId(this.correlationId), o.cacheFailedRequest(u), this.browserStorage.cleanRequestByState(r.state), u;
            case 5:
              return [
                2
                /*return*/
              ];
          }
        });
      });
    }, e.prototype.logout = function() {
      return Promise.reject(T.createSilentLogoutUnsupportedError());
    }, e;
  }(Ze)
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var no = (
  /** @class */
  function() {
    function n(e) {
      this.isBrowserEnvironment = typeof window < "u", this.config = Dn(e, this.isBrowserEnvironment), this.initialized = !1, this.logger = new Xt(this.config.system.loggerOptions, Ut, ct), this.networkClient = this.config.system.networkClient, this.navigationClient = this.config.system.navigationClient, this.redirectResponse = /* @__PURE__ */ new Map(), this.hybridAuthCodeResponses = /* @__PURE__ */ new Map(), this.performanceClient = this.isBrowserEnvironment ? new Zn(this.config.auth.clientId, this.config.auth.authority, this.logger, Ut, ct, this.config.telemetry.application, this.config.system.cryptoOptions) : new Sn(this.config.auth.clientId, this.config.auth.authority, this.logger, Ut, ct, this.config.telemetry.application), this.browserCrypto = this.isBrowserEnvironment ? new $n(this.logger, this.performanceClient, this.config.system.cryptoOptions) : It, this.eventHandler = new Kn(this.logger, this.browserCrypto), this.browserStorage = this.isBrowserEnvironment ? new Yt(this.config.auth.clientId, this.config.cache, this.browserCrypto, this.logger) : bn(this.config.auth.clientId, this.logger);
      var t = {
        cacheLocation: Q.MemoryStorage,
        temporaryCacheLocation: Q.MemoryStorage,
        storeAuthStateInCookie: !1,
        secureCookies: !1,
        cacheMigrationEnabled: !1
      };
      this.nativeInternalStorage = new Yt(this.config.auth.clientId, t, this.browserCrypto, this.logger), this.tokenCache = new eo(this.config, this.browserStorage, this.logger, this.browserCrypto), this.trackPageVisibilityWithMeasurement = this.trackPageVisibilityWithMeasurement.bind(this);
    }
    return n.prototype.initialize = function() {
      return v(this, void 0, void 0, function() {
        var e, t, r, o;
        return y(this, function(i) {
          switch (i.label) {
            case 0:
              if (this.logger.trace("initialize called"), this.initialized)
                return this.logger.info("initialize has already been called, exiting early."), [
                  2
                  /*return*/
                ];
              if (e = this.config.system.allowNativeBroker, t = this.performanceClient.startMeasurement(g.InitializeClientApplication), this.eventHandler.emitEvent(P.INITIALIZE_START), !e)
                return [3, 4];
              i.label = 1;
            case 1:
              return i.trys.push([1, 3, , 4]), r = this, [4, Ke.createProvider(this.logger, this.config.system.nativeBrokerHandshakeTimeout, this.performanceClient)];
            case 2:
              return r.nativeExtensionProvider = i.sent(), [3, 4];
            case 3:
              return o = i.sent(), this.logger.verbose(o), [3, 4];
            case 4:
              return this.initialized = !0, this.eventHandler.emitEvent(P.INITIALIZE_END), t.endMeasurement({ allowNativeBroker: e, success: !0 }), [
                2
                /*return*/
              ];
          }
        });
      });
    }, n.prototype.handleRedirectPromise = function(e) {
      return v(this, void 0, void 0, function() {
        var t, r, o, i, a, s, c, u, l = this;
        return y(this, function(d) {
          return this.logger.verbose("handleRedirectPromise called"), Y.blockNativeBrokerCalledBeforeInitialized(this.config.system.allowNativeBroker, this.initialized), t = this.getAllAccounts(), this.isBrowserEnvironment ? (r = e || h.EMPTY_STRING, o = this.redirectResponse.get(r), typeof o > "u" ? (this.eventHandler.emitEvent(P.HANDLE_REDIRECT_START, S.Redirect), this.logger.verbose("handleRedirectPromise has been called for the first time, storing the promise"), i = this.browserStorage.getCachedNativeRequest(), a = void 0, i && Ke.isNativeAvailable(this.config, this.logger, this.nativeExtensionProvider) && this.nativeExtensionProvider && !e ? (this.logger.trace("handleRedirectPromise - acquiring token from native platform"), s = new We(this.config, this.browserStorage, this.browserCrypto, this.logger, this.eventHandler, this.navigationClient, q.handleRedirectPromise, this.performanceClient, this.nativeExtensionProvider, i.accountId, this.nativeInternalStorage, i.correlationId), a = s.handleRedirectPromise()) : (this.logger.trace("handleRedirectPromise - acquiring token from web flow"), c = this.browserStorage.getTemporaryCache(x.CORRELATION_ID, !0) || h.EMPTY_STRING, u = this.createRedirectClient(c), a = u.handleRedirectPromise(e)), o = a.then(function(p) {
            if (p) {
              var f = t.length < l.getAllAccounts().length;
              f ? (l.eventHandler.emitEvent(P.LOGIN_SUCCESS, S.Redirect, p), l.logger.verbose("handleRedirectResponse returned result, login success")) : (l.eventHandler.emitEvent(P.ACQUIRE_TOKEN_SUCCESS, S.Redirect, p), l.logger.verbose("handleRedirectResponse returned result, acquire token success"));
            }
            return l.eventHandler.emitEvent(P.HANDLE_REDIRECT_END, S.Redirect), p;
          }).catch(function(p) {
            throw t.length > 0 ? l.eventHandler.emitEvent(P.ACQUIRE_TOKEN_FAILURE, S.Redirect, null, p) : l.eventHandler.emitEvent(P.LOGIN_FAILURE, S.Redirect, null, p), l.eventHandler.emitEvent(P.HANDLE_REDIRECT_END, S.Redirect), p;
          }), this.redirectResponse.set(r, o)) : this.logger.verbose("handleRedirectPromise has been called previously, returning the result from the first call"), [2, o]) : (this.logger.verbose("handleRedirectPromise returns null, not browser environment"), [2, null]);
        });
      });
    }, n.prototype.acquireTokenRedirect = function(e) {
      return v(this, void 0, void 0, function() {
        var t, r, o, i, a, s = this;
        return y(this, function(c) {
          return t = this.getRequestCorrelationId(e), this.logger.verbose("acquireTokenRedirect called", t), this.preflightBrowserEnvironmentCheck(S.Redirect), r = this.getAllAccounts().length > 0, r ? this.eventHandler.emitEvent(P.ACQUIRE_TOKEN_START, S.Redirect, e) : this.eventHandler.emitEvent(P.LOGIN_START, S.Redirect, e), this.nativeExtensionProvider && this.canUseNative(e) ? (i = new We(this.config, this.browserStorage, this.browserCrypto, this.logger, this.eventHandler, this.navigationClient, q.acquireTokenRedirect, this.performanceClient, this.nativeExtensionProvider, this.getNativeAccountId(e), this.nativeInternalStorage, e.correlationId), o = i.acquireTokenRedirect(e).catch(function(u) {
            if (u instanceof Ie && u.isFatal()) {
              s.nativeExtensionProvider = void 0;
              var l = s.createRedirectClient(e.correlationId);
              return l.acquireToken(e);
            } else if (u instanceof ye) {
              s.logger.verbose("acquireTokenRedirect - Resolving interaction required error thrown by native broker by falling back to web flow");
              var l = s.createRedirectClient(e.correlationId);
              return l.acquireToken(e);
            }
            throw s.browserStorage.setInteractionInProgress(!1), u;
          })) : (a = this.createRedirectClient(e.correlationId), o = a.acquireToken(e)), [2, o.catch(function(u) {
            throw r ? s.eventHandler.emitEvent(P.ACQUIRE_TOKEN_FAILURE, S.Redirect, null, u) : s.eventHandler.emitEvent(P.LOGIN_FAILURE, S.Redirect, null, u), u;
          })];
        });
      });
    }, n.prototype.acquireTokenPopup = function(e) {
      var t = this, r = this.getRequestCorrelationId(e), o = this.performanceClient.startMeasurement(g.AcquireTokenPopup, r);
      try {
        this.logger.verbose("acquireTokenPopup called", r), this.preflightBrowserEnvironmentCheck(S.Popup);
      } catch (c) {
        return Promise.reject(c);
      }
      var i = this.getAllAccounts();
      i.length > 0 ? this.eventHandler.emitEvent(P.ACQUIRE_TOKEN_START, S.Popup, e) : this.eventHandler.emitEvent(P.LOGIN_START, S.Popup, e);
      var a;
      if (this.canUseNative(e))
        a = this.acquireTokenNative(e, q.acquireTokenPopup).then(function(c) {
          return t.browserStorage.setInteractionInProgress(!1), o.endMeasurement({
            success: !0,
            isNativeBroker: !0,
            requestId: c.requestId
          }), c;
        }).catch(function(c) {
          if (c instanceof Ie && c.isFatal()) {
            t.nativeExtensionProvider = void 0;
            var u = t.createPopupClient(e.correlationId);
            return u.acquireToken(e);
          } else if (c instanceof ye) {
            t.logger.verbose("acquireTokenPopup - Resolving interaction required error thrown by native broker by falling back to web flow");
            var u = t.createPopupClient(e.correlationId);
            return u.acquireToken(e);
          }
          throw t.browserStorage.setInteractionInProgress(!1), c;
        });
      else {
        var s = this.createPopupClient(e.correlationId);
        a = s.acquireToken(e);
      }
      return a.then(function(c) {
        var u = i.length < t.getAllAccounts().length;
        return u ? t.eventHandler.emitEvent(P.LOGIN_SUCCESS, S.Popup, c) : t.eventHandler.emitEvent(P.ACQUIRE_TOKEN_SUCCESS, S.Popup, c), o.addStaticFields({
          accessTokenSize: c.accessToken.length,
          idTokenSize: c.idToken.length
        }), o.endMeasurement({
          success: !0,
          requestId: c.requestId
        }), c;
      }).catch(function(c) {
        return i.length > 0 ? t.eventHandler.emitEvent(P.ACQUIRE_TOKEN_FAILURE, S.Popup, null, c) : t.eventHandler.emitEvent(P.LOGIN_FAILURE, S.Popup, null, c), o.endMeasurement({
          errorCode: c.errorCode,
          subErrorCode: c.subError,
          success: !1
        }), Promise.reject(c);
      });
    }, n.prototype.trackPageVisibilityWithMeasurement = function() {
      var e = this.ssoSilentMeasurement || this.acquireTokenByCodeAsyncMeasurement;
      e && (this.logger.info("Perf: Visibility change detected in ", e.event.name), e.increment({
        visibilityChangeCount: 1
      }));
    }, n.prototype.ssoSilent = function(e) {
      var t;
      return v(this, void 0, void 0, function() {
        var r, o, i, a, s = this;
        return y(this, function(c) {
          return r = this.getRequestCorrelationId(e), o = A(A({}, e), {
            // will be PromptValue.NONE or PromptValue.NO_SESSION
            prompt: e.prompt,
            correlationId: r
          }), this.preflightBrowserEnvironmentCheck(S.Silent), this.ssoSilentMeasurement = this.performanceClient.startMeasurement(g.SsoSilent, r), (t = this.ssoSilentMeasurement) === null || t === void 0 || t.increment({
            visibilityChangeCount: 0
          }), document.addEventListener("visibilitychange", this.trackPageVisibilityWithMeasurement), this.logger.verbose("ssoSilent called", r), this.eventHandler.emitEvent(P.SSO_SILENT_START, S.Silent, o), this.canUseNative(o) ? i = this.acquireTokenNative(o, q.ssoSilent).catch(function(u) {
            if (u instanceof Ie && u.isFatal()) {
              s.nativeExtensionProvider = void 0;
              var l = s.createSilentIframeClient(o.correlationId);
              return l.acquireToken(o);
            }
            throw u;
          }) : (a = this.createSilentIframeClient(o.correlationId), i = a.acquireToken(o)), [2, i.then(function(u) {
            var l, d;
            return s.eventHandler.emitEvent(P.SSO_SILENT_SUCCESS, S.Silent, u), (l = s.ssoSilentMeasurement) === null || l === void 0 || l.addStaticFields({
              accessTokenSize: u.accessToken.length,
              idTokenSize: u.idToken.length
            }), (d = s.ssoSilentMeasurement) === null || d === void 0 || d.endMeasurement({
              success: !0,
              isNativeBroker: u.fromNativeBroker,
              requestId: u.requestId
            }), u;
          }).catch(function(u) {
            var l;
            throw s.eventHandler.emitEvent(P.SSO_SILENT_FAILURE, S.Silent, null, u), (l = s.ssoSilentMeasurement) === null || l === void 0 || l.endMeasurement({
              errorCode: u.errorCode,
              subErrorCode: u.subError,
              success: !1
            }), u;
          }).finally(function() {
            document.removeEventListener("visibilitychange", s.trackPageVisibilityWithMeasurement);
          })];
        });
      });
    }, n.prototype.acquireTokenByCode = function(e) {
      return v(this, void 0, void 0, function() {
        var t, r, o, i, a = this;
        return y(this, function(s) {
          t = this.getRequestCorrelationId(e), this.preflightBrowserEnvironmentCheck(S.Silent), this.logger.trace("acquireTokenByCode called", t), this.eventHandler.emitEvent(P.ACQUIRE_TOKEN_BY_CODE_START, S.Silent, e), r = this.performanceClient.startMeasurement(g.AcquireTokenByCode, e.correlationId);
          try {
            if (e.code && e.nativeAccountId)
              throw T.createSpaCodeAndNativeAccountIdPresentError();
            if (e.code)
              return o = e.code, i = this.hybridAuthCodeResponses.get(o), i ? (this.logger.verbose("Existing acquireTokenByCode request found", e.correlationId), r.discardMeasurement()) : (this.logger.verbose("Initiating new acquireTokenByCode request", t), i = this.acquireTokenByCodeAsync(A(A({}, e), { correlationId: t })).then(function(c) {
                return a.eventHandler.emitEvent(P.ACQUIRE_TOKEN_BY_CODE_SUCCESS, S.Silent, c), a.hybridAuthCodeResponses.delete(o), r.addStaticFields({
                  accessTokenSize: c.accessToken.length,
                  idTokenSize: c.idToken.length
                }), r.endMeasurement({
                  success: !0,
                  isNativeBroker: c.fromNativeBroker,
                  requestId: c.requestId
                }), c;
              }).catch(function(c) {
                throw a.hybridAuthCodeResponses.delete(o), a.eventHandler.emitEvent(P.ACQUIRE_TOKEN_BY_CODE_FAILURE, S.Silent, null, c), r.endMeasurement({
                  errorCode: c.errorCode,
                  subErrorCode: c.subError,
                  success: !1
                }), c;
              }), this.hybridAuthCodeResponses.set(o, i)), [2, i];
            if (e.nativeAccountId) {
              if (this.canUseNative(e, e.nativeAccountId))
                return [2, this.acquireTokenNative(e, q.acquireTokenByCode, e.nativeAccountId).catch(function(c) {
                  throw c instanceof Ie && c.isFatal() && (a.nativeExtensionProvider = void 0), c;
                })];
              throw T.createUnableToAcquireTokenFromNativePlatformError();
            } else
              throw T.createAuthCodeOrNativeAccountIdRequiredError();
          } catch (c) {
            throw this.eventHandler.emitEvent(P.ACQUIRE_TOKEN_BY_CODE_FAILURE, S.Silent, null, c), r.endMeasurement({
              errorCode: c instanceof k && c.errorCode || void 0,
              subErrorCode: c instanceof k && c.subError || void 0,
              success: !1
            }), c;
          }
          return [
            2
            /*return*/
          ];
        });
      });
    }, n.prototype.acquireTokenByCodeAsync = function(e) {
      var t;
      return v(this, void 0, void 0, function() {
        var r, o, i = this;
        return y(this, function(a) {
          switch (a.label) {
            case 0:
              return this.logger.trace("acquireTokenByCodeAsync called", e.correlationId), this.acquireTokenByCodeAsyncMeasurement = this.performanceClient.startMeasurement(g.AcquireTokenByCodeAsync, e.correlationId), (t = this.acquireTokenByCodeAsyncMeasurement) === null || t === void 0 || t.increment({
                visibilityChangeCount: 0
              }), document.addEventListener("visibilitychange", this.trackPageVisibilityWithMeasurement), r = this.createSilentAuthCodeClient(e.correlationId), [4, r.acquireToken(e).then(function(s) {
                var c;
                return (c = i.acquireTokenByCodeAsyncMeasurement) === null || c === void 0 || c.endMeasurement({
                  success: !0,
                  fromCache: s.fromCache,
                  isNativeBroker: s.fromNativeBroker,
                  requestId: s.requestId
                }), s;
              }).catch(function(s) {
                var c;
                throw (c = i.acquireTokenByCodeAsyncMeasurement) === null || c === void 0 || c.endMeasurement({
                  errorCode: s.errorCode,
                  subErrorCode: s.subError,
                  success: !1
                }), s;
              }).finally(function() {
                document.removeEventListener("visibilitychange", i.trackPageVisibilityWithMeasurement);
              })];
            case 1:
              return o = a.sent(), [2, o];
          }
        });
      });
    }, n.prototype.acquireTokenFromCache = function(e, t, r) {
      return v(this, void 0, void 0, function() {
        return y(this, function(o) {
          switch (this.performanceClient.addQueueMeasurement(g.AcquireTokenFromCache, t.correlationId), r.cacheLookupPolicy) {
            case ce.Default:
            case ce.AccessToken:
            case ce.AccessTokenAndRefreshToken:
              return [2, e.acquireToken(t)];
            default:
              throw w.createRefreshRequiredError();
          }
          return [
            2
            /*return*/
          ];
        });
      });
    }, n.prototype.acquireTokenByRefreshToken = function(e, t) {
      return v(this, void 0, void 0, function() {
        var r;
        return y(this, function(o) {
          switch (this.performanceClient.addQueueMeasurement(g.AcquireTokenByRefreshToken, e.correlationId), t.cacheLookupPolicy) {
            case ce.Default:
            case ce.AccessTokenAndRefreshToken:
            case ce.RefreshToken:
            case ce.RefreshTokenAndNetwork:
              return r = this.createSilentRefreshClient(e.correlationId), this.performanceClient.setPreQueueTime(g.SilentRefreshClientAcquireToken, e.correlationId), [2, r.acquireToken(e)];
            default:
              throw w.createRefreshRequiredError();
          }
          return [
            2
            /*return*/
          ];
        });
      });
    }, n.prototype.acquireTokenBySilentIframe = function(e) {
      return v(this, void 0, void 0, function() {
        var t;
        return y(this, function(r) {
          return this.performanceClient.addQueueMeasurement(g.AcquireTokenBySilentIframe, e.correlationId), t = this.createSilentIframeClient(e.correlationId), this.performanceClient.setPreQueueTime(g.SilentIframeClientAcquireToken, e.correlationId), [2, t.acquireToken(e)];
        });
      });
    }, n.prototype.logout = function(e) {
      return v(this, void 0, void 0, function() {
        var t;
        return y(this, function(r) {
          return t = this.getRequestCorrelationId(e), this.logger.warning("logout API is deprecated and will be removed in msal-browser v3.0.0. Use logoutRedirect instead.", t), [2, this.logoutRedirect(A({ correlationId: t }, e))];
        });
      });
    }, n.prototype.logoutRedirect = function(e) {
      return v(this, void 0, void 0, function() {
        var t, r;
        return y(this, function(o) {
          return t = this.getRequestCorrelationId(e), this.preflightBrowserEnvironmentCheck(S.Redirect), r = this.createRedirectClient(t), [2, r.logout(e)];
        });
      });
    }, n.prototype.logoutPopup = function(e) {
      try {
        var t = this.getRequestCorrelationId(e);
        this.preflightBrowserEnvironmentCheck(S.Popup);
        var r = this.createPopupClient(t);
        return r.logout(e);
      } catch (o) {
        return Promise.reject(o);
      }
    }, n.prototype.getAllAccounts = function() {
      return this.logger.verbose("getAllAccounts called"), this.isBrowserEnvironment ? this.browserStorage.getAllAccounts() : [];
    }, n.prototype.getAccountByUsername = function(e) {
      if (this.logger.trace("getAccountByUsername called"), !e)
        return this.logger.warning("getAccountByUsername: No username provided"), null;
      var t = this.browserStorage.getAccountInfoFilteredBy({ username: e });
      return t ? (this.logger.verbose("getAccountByUsername: Account matching username found, returning"), this.logger.verbosePii("getAccountByUsername: Returning signed-in accounts matching username: " + e), t) : (this.logger.verbose("getAccountByUsername: No matching account found, returning null"), null);
    }, n.prototype.getAccountByHomeId = function(e) {
      if (this.logger.trace("getAccountByHomeId called"), !e)
        return this.logger.warning("getAccountByHomeId: No homeAccountId provided"), null;
      var t = this.browserStorage.getAccountInfoFilteredBy({ homeAccountId: e });
      return t ? (this.logger.verbose("getAccountByHomeId: Account matching homeAccountId found, returning"), this.logger.verbosePii("getAccountByHomeId: Returning signed-in accounts matching homeAccountId: " + e), t) : (this.logger.verbose("getAccountByHomeId: No matching account found, returning null"), null);
    }, n.prototype.getAccountByLocalId = function(e) {
      if (this.logger.trace("getAccountByLocalId called"), !e)
        return this.logger.warning("getAccountByLocalId: No localAccountId provided"), null;
      var t = this.browserStorage.getAccountInfoFilteredBy({ localAccountId: e });
      return t ? (this.logger.verbose("getAccountByLocalId: Account matching localAccountId found, returning"), this.logger.verbosePii("getAccountByLocalId: Returning signed-in accounts matching localAccountId: " + e), t) : (this.logger.verbose("getAccountByLocalId: No matching account found, returning null"), null);
    }, n.prototype.setActiveAccount = function(e) {
      this.browserStorage.setActiveAccount(e);
    }, n.prototype.getActiveAccount = function() {
      return this.browserStorage.getActiveAccount();
    }, n.prototype.preflightBrowserEnvironmentCheck = function(e, t) {
      if (t === void 0 && (t = !0), this.logger.verbose("preflightBrowserEnvironmentCheck started"), Y.blockNonBrowserEnvironment(this.isBrowserEnvironment), Y.blockRedirectInIframe(e, this.config.system.allowRedirectInIframe), Y.blockReloadInHiddenIframes(), Y.blockAcquireTokenInPopups(), Y.blockNativeBrokerCalledBeforeInitialized(this.config.system.allowNativeBroker, this.initialized), e === S.Redirect && this.config.cache.cacheLocation === Q.MemoryStorage && !this.config.cache.storeAuthStateInCookie)
        throw Mt.createInMemoryRedirectUnavailableError();
      (e === S.Redirect || e === S.Popup) && this.preflightInteractiveRequest(t);
    }, n.prototype.preflightInteractiveRequest = function(e) {
      this.logger.verbose("preflightInteractiveRequest called, validating app environment"), Y.blockReloadInHiddenIframes(), e && this.browserStorage.setInteractionInProgress(!0);
    }, n.prototype.acquireTokenNative = function(e, t, r) {
      return v(this, void 0, void 0, function() {
        var o;
        return y(this, function(i) {
          if (this.logger.trace("acquireTokenNative called"), !this.nativeExtensionProvider)
            throw T.createNativeConnectionNotEstablishedError();
          return o = new We(this.config, this.browserStorage, this.browserCrypto, this.logger, this.eventHandler, this.navigationClient, t, this.performanceClient, this.nativeExtensionProvider, r || this.getNativeAccountId(e), this.nativeInternalStorage, e.correlationId), [2, o.acquireToken(e)];
        });
      });
    }, n.prototype.canUseNative = function(e, t) {
      if (this.logger.trace("canUseNative called"), !Ke.isNativeAvailable(this.config, this.logger, this.nativeExtensionProvider, e.authenticationScheme))
        return this.logger.trace("canUseNative: isNativeAvailable returned false, returning false"), !1;
      if (e.prompt)
        switch (e.prompt) {
          case ee.NONE:
          case ee.CONSENT:
          case ee.LOGIN:
            this.logger.trace("canUseNative: prompt is compatible with native flow");
            break;
          default:
            return this.logger.trace("canUseNative: prompt = " + e.prompt + " is not compatible with native flow, returning false"), !1;
        }
      return !t && !this.getNativeAccountId(e) ? (this.logger.trace("canUseNative: nativeAccountId is not available, returning false"), !1) : !0;
    }, n.prototype.getNativeAccountId = function(e) {
      var t = e.account || this.browserStorage.getAccountInfoByHints(e.loginHint, e.sid) || this.getActiveAccount();
      return t && t.nativeAccountId || "";
    }, n.prototype.createPopupClient = function(e) {
      return new Pn(this.config, this.browserStorage, this.browserCrypto, this.logger, this.eventHandler, this.navigationClient, this.performanceClient, this.nativeInternalStorage, this.nativeExtensionProvider, e);
    }, n.prototype.createRedirectClient = function(e) {
      return new Mn(this.config, this.browserStorage, this.browserCrypto, this.logger, this.eventHandler, this.navigationClient, this.performanceClient, this.nativeInternalStorage, this.nativeExtensionProvider, e);
    }, n.prototype.createSilentIframeClient = function(e) {
      return new Fn(this.config, this.browserStorage, this.browserCrypto, this.logger, this.eventHandler, this.navigationClient, q.ssoSilent, this.performanceClient, this.nativeInternalStorage, this.nativeExtensionProvider, e);
    }, n.prototype.createSilentCacheClient = function(e) {
      return new zr(this.config, this.browserStorage, this.browserCrypto, this.logger, this.eventHandler, this.navigationClient, this.performanceClient, this.nativeExtensionProvider, e);
    }, n.prototype.createSilentRefreshClient = function(e) {
      return new xn(this.config, this.browserStorage, this.browserCrypto, this.logger, this.eventHandler, this.navigationClient, this.performanceClient, this.nativeExtensionProvider, e);
    }, n.prototype.createSilentAuthCodeClient = function(e) {
      return new ro(this.config, this.browserStorage, this.browserCrypto, this.logger, this.eventHandler, this.navigationClient, q.acquireTokenByCode, this.performanceClient, this.nativeExtensionProvider, e);
    }, n.prototype.addEventCallback = function(e) {
      return this.eventHandler.addEventCallback(e);
    }, n.prototype.removeEventCallback = function(e) {
      this.eventHandler.removeEventCallback(e);
    }, n.prototype.addPerformanceCallback = function(e) {
      return this.performanceClient.addPerformanceCallback(e);
    }, n.prototype.removePerformanceCallback = function(e) {
      return this.performanceClient.removePerformanceCallback(e);
    }, n.prototype.enableAccountStorageEvents = function() {
      this.eventHandler.enableAccountStorageEvents();
    }, n.prototype.disableAccountStorageEvents = function() {
      this.eventHandler.disableAccountStorageEvents();
    }, n.prototype.getTokenCache = function() {
      return this.tokenCache;
    }, n.prototype.getLogger = function() {
      return this.logger;
    }, n.prototype.setLogger = function(e) {
      this.logger = e;
    }, n.prototype.initializeWrapperLibrary = function(e, t) {
      this.browserStorage.setWrapperMetadata(e, t);
    }, n.prototype.setNavigationClient = function(e) {
      this.navigationClient = e;
    }, n.prototype.getConfiguration = function() {
      return this.config;
    }, n.prototype.getRequestCorrelationId = function(e) {
      return e != null && e.correlationId ? e.correlationId : this.isBrowserEnvironment ? this.browserCrypto.createNewGuid() : h.EMPTY_STRING;
    }, n;
  }()
);
/*! @azure/msal-browser v2.37.0 2023-05-01 */
var oo = (
  /** @class */
  function(n) {
    X(e, n);
    function e(t) {
      var r = n.call(this, t) || this;
      return r.astsAsyncMeasurement = void 0, r.activeSilentTokenRequests = /* @__PURE__ */ new Map(), r.trackPageVisibility = r.trackPageVisibility.bind(r), r;
    }
    return e.prototype.loginRedirect = function(t) {
      return v(this, void 0, void 0, function() {
        var r;
        return y(this, function(o) {
          return r = this.getRequestCorrelationId(t), this.logger.verbose("loginRedirect called", r), [2, this.acquireTokenRedirect(A({ correlationId: r }, t || vr))];
        });
      });
    }, e.prototype.loginPopup = function(t) {
      var r = this.getRequestCorrelationId(t);
      return this.logger.verbose("loginPopup called", r), this.acquireTokenPopup(A({ correlationId: r }, t || vr));
    }, e.prototype.acquireTokenSilent = function(t) {
      return v(this, void 0, void 0, function() {
        var r, o, i, a, s, c, u, l = this;
        return y(this, function(d) {
          if (r = this.getRequestCorrelationId(t), o = this.performanceClient.startMeasurement(g.AcquireTokenSilent, r), o.addStaticFields({
            cacheLookupPolicy: t.cacheLookupPolicy
          }), this.preflightBrowserEnvironmentCheck(S.Silent), this.logger.verbose("acquireTokenSilent called", r), i = t.account || this.getActiveAccount(), !i)
            throw T.createNoAccountError();
          return a = {
            clientId: this.config.auth.clientId,
            authority: t.authority || h.EMPTY_STRING,
            scopes: t.scopes,
            homeAccountIdentifier: i.homeAccountId,
            claims: t.claims,
            authenticationScheme: t.authenticationScheme,
            resourceRequestMethod: t.resourceRequestMethod,
            resourceRequestUri: t.resourceRequestUri,
            shrClaims: t.shrClaims,
            sshKid: t.sshKid
          }, s = JSON.stringify(a), c = this.activeSilentTokenRequests.get(s), typeof c > "u" ? (this.logger.verbose("acquireTokenSilent called for the first time, storing active request", r), this.performanceClient.setPreQueueTime(g.AcquireTokenSilentAsync, r), u = this.acquireTokenSilentAsync(A(A({}, t), { correlationId: r }), i).then(function(p) {
            return l.activeSilentTokenRequests.delete(s), o.addStaticFields({
              accessTokenSize: p.accessToken.length,
              idTokenSize: p.idToken.length
            }), o.endMeasurement({
              success: !0,
              fromCache: p.fromCache,
              isNativeBroker: p.fromNativeBroker,
              cacheLookupPolicy: t.cacheLookupPolicy,
              requestId: p.requestId
            }), p;
          }).catch(function(p) {
            throw l.activeSilentTokenRequests.delete(s), o.endMeasurement({
              errorCode: p.errorCode,
              subErrorCode: p.subError,
              success: !1
            }), p;
          }), this.activeSilentTokenRequests.set(s, u), [2, u]) : (this.logger.verbose("acquireTokenSilent has been called previously, returning the result from the first call", r), o.discardMeasurement(), [2, c]);
        });
      });
    }, e.prototype.trackPageVisibility = function() {
      this.astsAsyncMeasurement && (this.logger.info("Perf: Visibility change detected"), this.astsAsyncMeasurement.increment({
        visibilityChangeCount: 1
      }));
    }, e.prototype.acquireTokenSilentAsync = function(t, r) {
      var o;
      return v(this, void 0, void 0, function() {
        var i, a, s, c, u, l = this;
        return y(this, function(d) {
          switch (d.label) {
            case 0:
              return this.performanceClient.addQueueMeasurement(g.AcquireTokenSilentAsync, t.correlationId), this.eventHandler.emitEvent(P.ACQUIRE_TOKEN_START, S.Silent, t), this.astsAsyncMeasurement = this.performanceClient.startMeasurement(g.AcquireTokenSilentAsync, t.correlationId), (o = this.astsAsyncMeasurement) === null || o === void 0 || o.increment({
                visibilityChangeCount: 0
              }), document.addEventListener("visibilitychange", this.trackPageVisibility), Ke.isNativeAvailable(this.config, this.logger, this.nativeExtensionProvider, t.authenticationScheme) && r.nativeAccountId ? (this.logger.verbose("acquireTokenSilent - attempting to acquire token from native platform"), a = A(A({}, t), { account: r }), i = this.acquireTokenNative(a, q.acquireTokenSilent_silentFlow).catch(function(p) {
                return v(l, void 0, void 0, function() {
                  var f;
                  return y(this, function(m) {
                    if (p instanceof Ie && p.isFatal())
                      return this.logger.verbose("acquireTokenSilent - native platform unavailable, falling back to web flow"), this.nativeExtensionProvider = void 0, f = this.createSilentIframeClient(t.correlationId), [2, f.acquireToken(t)];
                    throw p;
                  });
                });
              }), [3, 3]) : [3, 1];
            case 1:
              return this.logger.verbose("acquireTokenSilent - attempting to acquire token from web flow"), s = this.createSilentCacheClient(t.correlationId), this.performanceClient.setPreQueueTime(g.InitializeSilentRequest, t.correlationId), [4, s.initializeSilentRequest(t, r)];
            case 2:
              c = d.sent(), u = A(A({}, t), {
                // set the request's CacheLookupPolicy to Default if it was not optionally passed in
                cacheLookupPolicy: t.cacheLookupPolicy || ce.Default
              }), this.performanceClient.setPreQueueTime(g.AcquireTokenFromCache, c.correlationId), i = this.acquireTokenFromCache(s, c, u).catch(function(p) {
                if (u.cacheLookupPolicy === ce.AccessToken)
                  throw p;
                return Y.blockReloadInHiddenIframes(), l.eventHandler.emitEvent(P.ACQUIRE_TOKEN_NETWORK_START, S.Silent, c), l.performanceClient.setPreQueueTime(g.AcquireTokenByRefreshToken, c.correlationId), l.acquireTokenByRefreshToken(c, u).catch(function(f) {
                  var m = f instanceof Be, C = f instanceof ye, R = f.errorCode === ve.INVALID_GRANT_ERROR;
                  if ((!m || !R || C || u.cacheLookupPolicy === ce.AccessTokenAndRefreshToken || u.cacheLookupPolicy === ce.RefreshToken) && u.cacheLookupPolicy !== ce.Skip)
                    throw f;
                  return l.logger.verbose("Refresh token expired/invalid or CacheLookupPolicy is set to Skip, attempting acquire token by iframe.", t.correlationId), l.performanceClient.setPreQueueTime(g.AcquireTokenBySilentIframe, c.correlationId), l.acquireTokenBySilentIframe(c);
                });
              }), d.label = 3;
            case 3:
              return [2, i.then(function(p) {
                var f;
                return l.eventHandler.emitEvent(P.ACQUIRE_TOKEN_SUCCESS, S.Silent, p), (f = l.astsAsyncMeasurement) === null || f === void 0 || f.endMeasurement({
                  success: !0,
                  fromCache: p.fromCache,
                  isNativeBroker: p.fromNativeBroker,
                  requestId: p.requestId
                }), p;
              }).catch(function(p) {
                var f;
                throw l.eventHandler.emitEvent(P.ACQUIRE_TOKEN_FAILURE, S.Silent, null, p), (f = l.astsAsyncMeasurement) === null || f === void 0 || f.endMeasurement({
                  errorCode: p.errorCode,
                  subErrorCode: p.subError,
                  success: !1
                }), p;
              }).finally(function() {
                document.removeEventListener("visibilitychange", l.trackPageVisibility);
              })];
          }
        });
      });
    }, e;
  }(no)
);
const wr = {
  auth: null,
  cache: {
    cacheLocation: "sessionStorage",
    storeAuthStateInCookie: !1
  },
  system: {
    loggerOptions: {
      loggerCallback: (n, e, t) => {
        if (!t)
          switch (n) {
            case z.Error:
              console.error(e);
              return;
            case z.Info:
              console.info(e);
              return;
            case z.Verbose:
              console.debug(e);
              return;
            case z.Warning:
              console.warn(e);
              return;
          }
      },
      piiLoggingEnabled: !1
    },
    windowHashTimeout: 6e4,
    iframeHashTimeout: 6e3,
    loadFrameTimeout: 0
  }
}, Wr = {
  build: () => {
    var i, a;
    const n = ((a = (i = window.sev) == null ? void 0 : i.msal) == null ? void 0 : a.auth) ?? {}, e = {
      clientId: !1,
      redirectUri: !1,
      postLogoutRedirectUri: !1,
      authority: "https://login.microsoftonline.com/dd11a536-5f3d-4ff7-a65c-5db5854a984a",
      knownAuthorities: [],
      navigateToLoginRequestUrl: !0
    }, { clientId: t, redirectUri: r, redirectUri: o } = n;
    return wr.auth = { ...e, clientId: t, redirectUri: r, postLogoutRedirectUri: o }, new oo(wr);
  }
};
function Ce() {
}
function rr(n) {
  return n();
}
function Sr() {
  return /* @__PURE__ */ Object.create(null);
}
function ft(n) {
  n.forEach(rr);
}
function jt(n) {
  return typeof n == "function";
}
function Jr(n, e) {
  return n != n ? e == e : n !== e || n && typeof n == "object" || typeof n == "function";
}
function io(n) {
  return Object.keys(n).length === 0;
}
function le(n, e) {
  n.appendChild(e);
}
function te(n, e, t) {
  n.insertBefore(e, t || null);
}
function ne(n) {
  n.parentNode && n.parentNode.removeChild(n);
}
function oe(n) {
  return document.createElement(n);
}
function ht(n) {
  return document.createTextNode(n);
}
function Me() {
  return ht(" ");
}
function Xr(n, e, t, r) {
  return n.addEventListener(e, t, r), () => n.removeEventListener(e, t, r);
}
function ge(n, e, t) {
  t == null ? n.removeAttribute(e) : n.getAttribute(e) !== t && n.setAttribute(e, t);
}
function ao(n) {
  return Array.from(n.childNodes);
}
function nr(n, e) {
  e = "" + e, n.data !== e && (n.data = e);
}
function $r(n) {
  const e = {};
  for (const t of n)
    e[t.name] = t.value;
  return e;
}
let or;
function ut(n) {
  or = n;
}
const Ge = [], Ar = [];
let Je = [];
const kr = [], so = /* @__PURE__ */ Promise.resolve();
let Vt = !1;
function co() {
  Vt || (Vt = !0, so.then(Ue));
}
function Wt(n) {
  Je.push(n);
}
const Ht = /* @__PURE__ */ new Set();
let qe = 0;
function Ue() {
  if (qe !== 0)
    return;
  const n = or;
  do {
    try {
      for (; qe < Ge.length; ) {
        const e = Ge[qe];
        qe++, ut(e), uo(e.$$);
      }
    } catch (e) {
      throw Ge.length = 0, qe = 0, e;
    }
    for (ut(null), Ge.length = 0, qe = 0; Ar.length; )
      Ar.pop()();
    for (let e = 0; e < Je.length; e += 1) {
      const t = Je[e];
      Ht.has(t) || (Ht.add(t), t());
    }
    Je.length = 0;
  } while (Ge.length);
  for (; kr.length; )
    kr.pop()();
  Vt = !1, Ht.clear(), ut(n);
}
function uo(n) {
  if (n.fragment !== null) {
    n.update(), ft(n.before_update);
    const e = n.dirty;
    n.dirty = [-1], n.fragment && n.fragment.p(n.ctx, e), n.after_update.forEach(Wt);
  }
}
function lo(n) {
  const e = [], t = [];
  Je.forEach((r) => n.indexOf(r) === -1 ? e.push(r) : t.push(r)), t.forEach((r) => r()), Je = e;
}
const ho = /* @__PURE__ */ new Set();
function po(n, e) {
  n && n.i && (ho.delete(n), n.i(e));
}
function fo(n, e, t, r) {
  const { fragment: o, after_update: i } = n.$$;
  o && o.m(e, t), r || Wt(() => {
    const a = n.$$.on_mount.map(rr).filter(jt);
    n.$$.on_destroy ? n.$$.on_destroy.push(...a) : ft(a), n.$$.on_mount = [];
  }), i.forEach(Wt);
}
function go(n, e) {
  const t = n.$$;
  t.fragment !== null && (lo(t.after_update), ft(t.on_destroy), t.fragment && t.fragment.d(e), t.on_destroy = t.fragment = null, t.ctx = []);
}
function mo(n, e) {
  n.$$.dirty[0] === -1 && (Ge.push(n), co(), n.$$.dirty.fill(0)), n.$$.dirty[e / 31 | 0] |= 1 << e % 31;
}
function Zr(n, e, t, r, o, i, a, s = [-1]) {
  const c = or;
  ut(n);
  const u = n.$$ = {
    fragment: null,
    ctx: [],
    // state
    props: i,
    update: Ce,
    not_equal: o,
    bound: Sr(),
    // lifecycle
    on_mount: [],
    on_destroy: [],
    on_disconnect: [],
    before_update: [],
    after_update: [],
    context: new Map(e.context || (c ? c.$$.context : [])),
    // everything else
    callbacks: Sr(),
    dirty: s,
    skip_bound: !1,
    root: e.target || c.$$.root
  };
  a && a(u.root);
  let l = !1;
  if (u.ctx = t ? t(n, e.props || {}, (d, p, ...f) => {
    const m = f.length ? f[0] : p;
    return u.ctx && o(u.ctx[d], u.ctx[d] = m) && (!u.skip_bound && u.bound[d] && u.bound[d](m), l && mo(n, d)), p;
  }) : [], u.update(), l = !0, ft(u.before_update), u.fragment = r ? r(u.ctx) : !1, e.target) {
    if (e.hydrate) {
      const d = ao(e.target);
      u.fragment && u.fragment.l(d), d.forEach(ne);
    } else
      u.fragment && u.fragment.c();
    e.intro && po(n.$$.fragment), fo(n, e.target, e.anchor, e.customElement), Ue();
  }
  ut(c);
}
let ir;
typeof HTMLElement == "function" && (ir = class extends HTMLElement {
  constructor() {
    super(), this.attachShadow({ mode: "open" });
  }
  connectedCallback() {
    const { on_mount: n } = this.$$;
    this.$$.on_disconnect = n.map(rr).filter(jt);
    for (const e in this.$$.slotted)
      this.appendChild(this.$$.slotted[e]);
  }
  attributeChangedCallback(n, e, t) {
    this[n] = t;
  }
  disconnectedCallback() {
    ft(this.$$.on_disconnect);
  }
  $destroy() {
    go(this, 1), this.$destroy = Ce;
  }
  $on(n, e) {
    if (!jt(e))
      return Ce;
    const t = this.$$.callbacks[n] || (this.$$.callbacks[n] = []);
    return t.push(e), () => {
      const r = t.indexOf(e);
      r !== -1 && t.splice(r, 1);
    };
  }
  $set(n) {
    this.$$set && !io(n) && (this.$$.skip_bound = !0, this.$$set(n), this.$$.skip_bound = !1);
  }
});
function vo(n) {
  let e;
  return {
    c() {
      e = oe("div"), e.innerHTML = '<div class="msal-not-loaded">No se encontró configuración de acceso.</div>', ge(e, "class", "msal-main");
    },
    m(t, r) {
      te(t, e, r);
    },
    p: Ce,
    d(t) {
      t && ne(e);
    }
  };
}
function yo(n) {
  let e, t, r, o, i, a, s, c, u, l = (
    /*bienvenida*/
    n[1] && br(n)
  ), d = !/*isAuth*/
  n[5] && Rr(), p = !/*isConnecting*/
  n[2] && !/*isValidating*/
  n[3] && !/*isAuth*/
  n[5] && Nr(n), f = (
    /*isConnecting*/
    n[2] && Mr()
  ), m = (
    /*isValidating*/
    n[3] && Pr()
  ), C = (
    /*isAuth*/
    n[5] && Or(n)
  ), R = (
    /*isUserError*/
    n[4] && Ur()
  );
  return {
    c() {
      e = oe("p"), e.innerHTML = "<strong>Ingresa con tu cuenta institucional</strong>", t = Me(), r = oe("div"), l && l.c(), o = Me(), d && d.c(), i = Me(), p && p.c(), a = Me(), f && f.c(), s = Me(), m && m.c(), c = Me(), C && C.c(), u = Me(), R && R.c(), ge(e, "class", "msal-header"), ge(r, "class", "msal-main");
    },
    m(b, N) {
      te(b, e, N), te(b, t, N), te(b, r, N), l && l.m(r, null), le(r, o), d && d.m(r, null), le(r, i), p && p.m(r, null), le(r, a), f && f.m(r, null), le(r, s), m && m.m(r, null), le(r, c), C && C.m(r, null), le(r, u), R && R.m(r, null);
    },
    p(b, N) {
      /*bienvenida*/
      b[1] ? l ? l.p(b, N) : (l = br(b), l.c(), l.m(r, o)) : l && (l.d(1), l = null), /*isAuth*/
      b[5] ? d && (d.d(1), d = null) : d || (d = Rr(), d.c(), d.m(r, i)), !/*isConnecting*/
      b[2] && !/*isValidating*/
      b[3] && !/*isAuth*/
      b[5] ? p ? p.p(b, N) : (p = Nr(b), p.c(), p.m(r, a)) : p && (p.d(1), p = null), /*isConnecting*/
      b[2] ? f || (f = Mr(), f.c(), f.m(r, s)) : f && (f.d(1), f = null), /*isValidating*/
      b[3] ? m || (m = Pr(), m.c(), m.m(r, c)) : m && (m.d(1), m = null), /*isAuth*/
      b[5] ? C ? C.p(b, N) : (C = Or(b), C.c(), C.m(r, u)) : C && (C.d(1), C = null), /*isUserError*/
      b[4] ? R || (R = Ur(), R.c(), R.m(r, null)) : R && (R.d(1), R = null);
    },
    d(b) {
      b && ne(e), b && ne(t), b && ne(r), l && l.d(), d && d.d(), p && p.d(), f && f.d(), m && m.d(), C && C.d(), R && R.d();
    }
  };
}
function br(n) {
  let e, t;
  return {
    c() {
      e = oe("p"), t = ht(
        /*bienvenida*/
        n[1]
      ), ge(e, "class", "msal-welcome");
    },
    m(r, o) {
      te(r, e, o), le(e, t);
    },
    p(r, o) {
      o & /*bienvenida*/
      2 && nr(
        t,
        /*bienvenida*/
        r[1]
      );
    },
    d(r) {
      r && ne(e);
    }
  };
}
function Rr(n) {
  let e;
  return {
    c() {
      e = oe("p"), e.textContent = "Utiliza los datos con los que accedes a tu correo electrónico @msev.gob.mx", ge(e, "class", "msal-text");
    },
    m(t, r) {
      te(t, e, r);
    },
    d(t) {
      t && ne(e);
    }
  };
}
function Nr(n) {
  let e, t, r;
  return {
    c() {
      e = oe("button"), e.innerHTML = '<img class="msal-icon" alt="Logo Microsoft" src="data:image/svg+xml; base64, PHN2ZyBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAyNDk5LjYgMjUwMCIgdmlld0JveD0iMCAwIDI0OTkuNiAyNTAwIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Im0xMTg3LjkgMTE4Ny45aC0xMTg3Ljl2LTExODcuOWgxMTg3Ljl6IiBmaWxsPSIjZjE1MTFiIi8+PHBhdGggZD0ibTI0OTkuNiAxMTg3LjloLTExODh2LTExODcuOWgxMTg3Ljl2MTE4Ny45eiIgZmlsbD0iIzgwY2MyOCIvPjxwYXRoIGQ9Im0xMTg3LjkgMjUwMGgtMTE4Ny45di0xMTg3LjloMTE4Ny45eiIgZmlsbD0iIzAwYWRlZiIvPjxwYXRoIGQ9Im0yNDk5LjYgMjUwMGgtMTE4OHYtMTE4Ny45aDExODcuOXYxMTg3Ljl6IiBmaWxsPSIjZmJiYzA5Ii8+PC9zdmc+"/> Iniciar sesión con Microsoft', ge(e, "class", "msal-button");
    },
    m(o, i) {
      te(o, e, i), t || (r = Xr(
        e,
        "click",
        /*requestLogin*/
        n[7]
      ), t = !0);
    },
    p: Ce,
    d(o) {
      o && ne(e), t = !1, r();
    }
  };
}
function Mr(n) {
  let e;
  return {
    c() {
      e = oe("span"), e.innerHTML = "Redireccionando al servicio de autenticación. <br/> por favor espere...", ge(e, "class", "msal-message");
    },
    m(t, r) {
      te(t, e, r);
    },
    d(t) {
      t && ne(e);
    }
  };
}
function Pr(n) {
  let e;
  return {
    c() {
      e = oe("span"), e.innerHTML = "Verificando su perfil. <br/> por favor espere...", ge(e, "class", "msal-message");
    },
    m(t, r) {
      te(t, e, r);
    },
    d(t) {
      t && ne(e);
    }
  };
}
function Or(n) {
  let e, t, r, o, i;
  return {
    c() {
      e = oe("span"), t = ht("Acceso concedido. "), r = oe("br"), o = Me(), i = ht(
        /*redireccion*/
        n[0]
      ), ge(e, "class", "msal-message");
    },
    m(a, s) {
      te(a, e, s), le(e, t), le(e, r), le(e, o), le(e, i);
    },
    p(a, s) {
      s & /*redireccion*/
      1 && nr(
        i,
        /*redireccion*/
        a[0]
      );
    },
    d(a) {
      a && ne(e);
    }
  };
}
function Ur(n) {
  let e, t;
  return {
    c() {
      e = oe("br"), t = oe("span"), t.innerHTML = "Se presentó un problema con su cuenta y no se puede continuar.<br/>Se procede a cerrar su sesión", ge(t, "class", "msal-message error");
    },
    m(r, o) {
      te(r, e, o), te(r, t, o);
    },
    d(r) {
      r && ne(e), r && ne(t);
    }
  };
}
function Co(n) {
  let e;
  function t(i, a) {
    return (
      /*configDefined*/
      i[6] ? yo : vo
    );
  }
  let o = t(n)(n);
  return {
    c() {
      e = oe("main"), o.c(), this.c = Ce;
    },
    m(i, a) {
      te(i, e, a), o.m(e, null);
    },
    p(i, [a]) {
      o.p(i, a);
    },
    i: Ce,
    o: Ce,
    d(i) {
      i && ne(e), o.d();
    }
  };
}
function Eo(n, e, t) {
  var f;
  let { redireccion: r = "Redirigiendo, espere por favor..." } = e, { bienvenida: o = "" } = e, i = !1, a = !1, s = !1, c = !1;
  const u = Wr.build(), l = !!((f = window.sev) != null && f.msal);
  u.handleRedirectPromise().then((m) => {
    m && (t(3, a = !0), u.setActiveAccount(m.account), Hr.validate(
      m.account.username,
      m.uniqueId,
      (C) => {
        var R, b, N, D;
        (b = (R = window.sev) == null ? void 0 : R.msal) != null && b.onAuthSuccess && (t(3, a = !1), t(5, c = !0), (D = (N = window.sev) == null ? void 0 : N.msal) == null || D.onAuthSuccess(C));
      },
      (C) => {
        var R, b, N, D;
        t(3, a = !1), t(4, s = !0), (b = (R = window.sev) == null ? void 0 : R.msal) != null && b.onAuthError && ((D = (N = wwindow.sev) == null ? void 0 : N.msal) == null || D.onAuthError(C), setTimeout(
          () => {
            d();
          },
          3e3
        ));
      }
    ));
  }).catch((m) => {
    console.log(m);
  });
  function d() {
    const m = u.getActiveAccount().homeAccountId, C = u.getAccountByHomeId(m);
    u.logoutRedirect({ account: C });
  }
  function p() {
    t(4, s = !1), t(2, i = !0), u.loginRedirect();
  }
  return n.$$set = (m) => {
    "redireccion" in m && t(0, r = m.redireccion), "bienvenida" in m && t(1, o = m.bienvenida);
  }, [
    r,
    o,
    i,
    a,
    s,
    c,
    l,
    p
  ];
}
class _o extends ir {
  constructor(e) {
    super();
    const t = document.createElement("style");
    t.textContent = "p.msal-header{font-family:Arial, Helvetica, sans-serif;text-align:center}div.msal-not-loaded{font-family:Arial, Helvetica, sans-serif;padding-top:15px}span.msal-message{font-family:Arial, Helvetica, sans-serif}p.msal-welcome{font-family:Arial, Helvetica, sans-serif}span.msal-message.error{font-family:Arial, Helvetica, sans-serif;color:#8a133e}div.msal-main{margin:0 auto;padding:10px 10px 30px;max-width:500px;border:1px solid #ececec;border-radius:5px;box-shadow:#ececec 2px 2px 3xp;text-align:center}p.msal-text{font-family:Arial, Helvetica, sans-serif;color:#777}button.msal-button{background-color:rgb(52, 118, 204);border-radius:8px;border:1px solid transparent;padding:0.6em 1.2em;font-size:1em;font-weight:500;font-family:inherit;cursor:pointer;transition:border-color 0.25s;font-family:Arial, Helvetica, sans-serif;color:#fff}img.msal-icon{width:16px;height:16px}", this.shadowRoot.appendChild(t), Zr(
      this,
      {
        target: this.shadowRoot,
        props: $r(this.attributes),
        customElement: !0
      },
      Eo,
      Co,
      Jr,
      { redireccion: 0, bienvenida: 1 },
      null
    ), e && (e.target && te(e.target, this, e.anchor), e.props && (this.$set(e.props), Ue()));
  }
  static get observedAttributes() {
    return ["redireccion", "bienvenida"];
  }
  get redireccion() {
    return this.$$.ctx[0];
  }
  set redireccion(e) {
    this.$$set({ redireccion: e }), Ue();
  }
  get bienvenida() {
    return this.$$.ctx[1];
  }
  set bienvenida(e) {
    this.$$set({ bienvenida: e }), Ue();
  }
}
customElements.define("msal-login-button", _o);
function To(n) {
  let e, t, r, o, i;
  return {
    c() {
      e = oe("main"), t = oe("button"), r = ht(
        /*texto*/
        n[0]
      ), this.c = Ce, ge(
        t,
        "class",
        /*buttonclass*/
        n[1]
      );
    },
    m(a, s) {
      te(a, e, s), le(e, t), le(t, r), o || (i = Xr(
        t,
        "click",
        /*doLogout*/
        n[2]
      ), o = !0);
    },
    p(a, [s]) {
      s & /*texto*/
      1 && nr(
        r,
        /*texto*/
        a[0]
      ), s & /*buttonclass*/
      2 && ge(
        t,
        "class",
        /*buttonclass*/
        a[1]
      );
    },
    i: Ce,
    o: Ce,
    d(a) {
      a && ne(e), o = !1, i();
    }
  };
}
function Io(n, e, t) {
  let { texto: r = "Salir" } = e, { buttonclass: o = "logout-button" } = e;
  const i = Wr.build();
  function a() {
    var c, u, l, d;
    (u = (c = window.sev) == null ? void 0 : c.msal) != null && u.onLogout && ((d = (l = window.sev) == null ? void 0 : l.msal) == null || d.onLogout), s();
  }
  function s() {
    try {
      const c = i.getActiveAccount().homeAccountId, u = i.getAccountByHomeId(c);
      i.logoutRedirect({ account: u });
    } catch {
      i.logoutRedirect();
    }
  }
  return n.$$set = (c) => {
    "texto" in c && t(0, r = c.texto), "buttonclass" in c && t(1, o = c.buttonclass);
  }, [r, o, a];
}
class wo extends ir {
  constructor(e) {
    super(), Zr(
      this,
      {
        target: this.shadowRoot,
        props: $r(this.attributes),
        customElement: !0
      },
      Io,
      To,
      Jr,
      { texto: 0, buttonclass: 1 },
      null
    ), e && (e.target && te(e.target, this, e.anchor), e.props && (this.$set(e.props), Ue()));
  }
  static get observedAttributes() {
    return ["texto", "buttonclass"];
  }
  get texto() {
    return this.$$.ctx[0];
  }
  set texto(e) {
    this.$$set({ texto: e }), Ue();
  }
  get buttonclass() {
    return this.$$.ctx[1];
  }
  set buttonclass(e) {
    this.$$set({ buttonclass: e }), Ue();
  }
}
customElements.define("msal-logout-button", wo);
export {
  Hr as idsev,
  Wr as msalInstanceBuilder
};

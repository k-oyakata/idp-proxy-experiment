<?php
/**
 * SAML 2.0 remote IdP metadata for SimpleSAMLphp.
 *
 * Remember to remove the IdPs you don't use from this file.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-idp-remote 
 */

$metadata['https://nbhub.ecloud.nii.ac.jp/simplesaml/saml2/idp/metadata.php'] = array (
  'entityid' => 'https/nbhub.ecloud.nii.ac.jp/simplesaml/saml2/idp/metadata.php',
  'contacts' => 
  array (
    0 => 
    array (
      'contactType' => 'technical',
      'givenName' => 'Administrator',
      'emailAddress' => 
      array (
        0 => 'k-sasaki@axsh.net',
      ),
    ),
  ),
  'metadata-set' => 'saml20-idp-remote',
  'SingleSignOnService' => 
  array (
    0 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://nbhub.ecloud.nii.ac.jp/simplesaml/saml2/idp/SSOService.php',
    ),
  ),
  'SingleLogoutService' => 
  array (
    0 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://nbhub.ecloud.nii.ac.jp/simplesaml/saml2/idp/SingleLogoutService.php',
    ),
  ),
  'ArtifactResolutionService' => 
  array (
  ),
  'NameIDFormats' => 
  array (
    0 => 'urn:oasis:names:tc:SAML:2.0:nameid-format:transient',
  ),
  'keys' => 
  array (
    0 => 
    array (
      'encryption' => false,
      'signing' => true,
      'type' => 'X509Certificate',
      'X509Certificate' => 'MIIDSzCCAjOgAwIBAgIJAKOhO+Y82LQWMA0GCSqGSIb3DQEBCwUAMDwxCzAJBgNVBAYTAkpQMQ4wDAYDVQQIDAVKYXBhbjEOMAwGA1UEBwwFVG9reW8xDTALBgNVBAoMBEF4c2gwHhcNMTYxMDI2MTYzMjU4WhcNMjYxMDI2MTYzMjU4WjA8MQswCQYDVQQGEwJKUDEOMAwGA1UECAwFSmFwYW4xDjAMBgNVBAcMBVRva3lvMQ0wCwYDVQQKDARBeHNoMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAqK91oid58xXYzYnZe59uE27CQXESPitCvVa/HBlArhP3BvLHkZ2/P7RJmW7EIzHBRUKqesHuzVK8Q0zsDeUIoiNKAmW2t4pvsbNk0ZkY+duPF9tRs+S3LjA1iQmO2dr7oHbdBnY+q93hxsqCV0RYAncHWUMKp2M7lF4bV36u2uFsmhSsnZVZVHlDTROml3DyJtbYpbaJDWhH/fkK0WABgvdr2A7kNZmBAQkxlDAU6wX0fOJh/vSq4TBCHoSJKVSWQKuCxob9NldLNDoSA2VTvrbCo6kt13qffzDGxERvz/e21rdtxWKpmPOICFApdunbPw6eXGOmzFVHa7Tas5d2dQIDAQABo1AwTjAdBgNVHQ4EFgQUyfeiOWHlQ5fpB+OX47m52DTTchcwHwYDVR0jBBgwFoAUyfeiOWHlQ5fpB+OX47m52DTTchcwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQsFAAOCAQEAdjPaMsQGXGGkei97+lHvdh1MjNShPnRkEnTESq3KpHLGpZ8fV4+Yk8g+QMR5dsiiYrSGnIcI+I1a+nU6qhVp3jOkLjJ7NODpM8Bx3GaDdOyQQwS3xLx7lxNJKADKsny1yUXk0W4hEhf+KLWzI0YI0ESGgIixY0R5NH4MXUnJMP8GDuoac6/HKjpvNO2I2LYtEyhN24Tu6fcNiZyhjEjQH2W6/KUXHGPqjWEbOAY0Oa/SftZKHczElVoP0246AMeYqG8MYHNsfr4dq602wTB5bsShQk+PJFYbmNU6RKuoV/mcWwdL0imu63ouEnMzAC5tAxEAE5tiRGIxXkgQVOaLTQ==',
    ),
    1 => 
    array (
      'encryption' => true,
      'signing' => false,
      'type' => 'X509Certificate',
      'X509Certificate' => 'MIIDSzCCAjOgAwIBAgIJAKOhO+Y82LQWMA0GCSqGSIb3DQEBCwUAMDwxCzAJBgNVBAYTAkpQMQ4wDAYDVQQIDAVKYXBhbjEOMAwGA1UEBwwFVG9reW8xDTALBgNVBAoMBEF4c2gwHhcNMTYxMDI2MTYzMjU4WhcNMjYxMDI2MTYzMjU4WjA8MQswCQYDVQQGEwJKUDEOMAwGA1UECAwFSmFwYW4xDjAMBgNVBAcMBVRva3lvMQ0wCwYDVQQKDARBeHNoMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAqK91oid58xXYzYnZe59uE27CQXESPitCvVa/HBlArhP3BvLHkZ2/P7RJmW7EIzHBRUKqesHuzVK8Q0zsDeUIoiNKAmW2t4pvsbNk0ZkY+duPF9tRs+S3LjA1iQmO2dr7oHbdBnY+q93hxsqCV0RYAncHWUMKp2M7lF4bV36u2uFsmhSsnZVZVHlDTROml3DyJtbYpbaJDWhH/fkK0WABgvdr2A7kNZmBAQkxlDAU6wX0fOJh/vSq4TBCHoSJKVSWQKuCxob9NldLNDoSA2VTvrbCo6kt13qffzDGxERvz/e21rdtxWKpmPOICFApdunbPw6eXGOmzFVHa7Tas5d2dQIDAQABo1AwTjAdBgNVHQ4EFgQUyfeiOWHlQ5fpB+OX47m52DTTchcwHwYDVR0jBBgwFoAUyfeiOWHlQ5fpB+OX47m52DTTchcwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQsFAAOCAQEAdjPaMsQGXGGkei97+lHvdh1MjNShPnRkEnTESq3KpHLGpZ8fV4+Yk8g+QMR5dsiiYrSGnIcI+I1a+nU6qhVp3jOkLjJ7NODpM8Bx3GaDdOyQQwS3xLx7lxNJKADKsny1yUXk0W4hEhf+KLWzI0YI0ESGgIixY0R5NH4MXUnJMP8GDuoac6/HKjpvNO2I2LYtEyhN24Tu6fcNiZyhjEjQH2W6/KUXHGPqjWEbOAY0Oa/SftZKHczElVoP0246AMeYqG8MYHNsfr4dq602wTB5bsShQk+PJFYbmNU6RKuoV/mcWwdL0imu63ouEnMzAC5tAxEAE5tiRGIxXkgQVOaLTQ==',
    ),
  ),
);

<?php
/**
 * SAML 2.0 remote IdP metadata for SimpleSAMLphp.
 *
 * Remember to remove the IdPs you don't use from this file.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-idp-remote 
 */

$metadata['https://shib-idp.other.org:4443/simplesaml/saml2/idp/metadata.php'] = array (
  'entityid' => 'https://shib-idp.other.org:4443/simplesaml/saml2/idp/metadata.php',
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
      'Location' => 'https://dummy-idp.other.org:4443/simplesaml/saml2/idp/SSOService.php',
    ),
  ),
  'SingleLogoutService' => 
  array (
    0 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://dummy-idp.other.org:4443/simplesaml/saml2/idp/SingleLogoutService.php',
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
      'X509Certificate' => 'MIIDSzCCAjOgAwIBAgIJAObH1MsH1/icMA0GCSqGSIb3DQEBCwUAMDwxCzAJBgNVBAYTAkpQMQ4wDAYDVQQIDAVKYXBhbjEOMAwGA1UEBwwFVG9reW8xDTALBgNVBAoMBEF4c2gwHhcNMTYxMTAxMTMyMDA2WhcNMjYxMTAxMTMyMDA2WjA8MQswCQYDVQQGEwJKUDEOMAwGA1UECAwFSmFwYW4xDjAMBgNVBAcMBVRva3lvMQ0wCwYDVQQKDARBeHNoMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAqtHSgj6+hloUjYItvXxSwlZoCnVUED/4QxUKi5/22JExp4HaZgRmwMc2bRI+KmkeS+BIkkPxv+/oBDwwJ7CcK3CQ7Edz4ncdt8kQx3fQAYXgRgazeJhGJhJXULlZN2ShA1DKsECIjAlPuO9p3MnaDkDfXtCBtoQHboLK0fVmY49QfM2/TBJSQoJ6GCiHXi1n6fAOEaRsdl0QZ8YLwmSvrtO0evHvkz8uftkFuDunO/zWeOr3bcDL4FaWBfLcxNZwO+gn/WB1zQ+XTUfZ3SBsUq+jHlANqk4vdJhCJ4MsvmtcUUvMtY1GSTmeJzKW+NHD/c5Iu6lQzsshIwtKqDD2eQIDAQABo1AwTjAdBgNVHQ4EFgQUjkiDQJAF4wFSVu8YhM4zx6kWY4AwHwYDVR0jBBgwFoAUjkiDQJAF4wFSVu8YhM4zx6kWY4AwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQsFAAOCAQEAQ9wmGGaB7uEv8cOoUsEmDQpx9grUEBi8r5fLrRud0GYv2fZVBCaZYTUE5TdSQTa/BnOlAxrKbqDUWSOpcN7lq5yT6dl5PY311K9OiF6eDFsm3gD+p5Tm00/5mX1PF6pHs00SVOnFy3s1VOw/46YqgBOoxdP6nVASx5Yu7VQv10b1ImPRUo3hVF82+LbeH2Nq2k5Xdd3Xjqq/Qc+rh6ZTNFFqLjPjcaVRKq3k9JRqQWSbdfqMqGG4pjSlYrXCx6Vqnj2lh0OcPOQnmyz5X57+7wD1WPph0BC6QuVyQtVHnrK8Sfu6m6X4BjJkVdlSHCM6/QiKrYThEoLkLlKEBrQDNQ==',
    ),
    1 => 
    array (
      'encryption' => true,
      'signing' => false,
      'type' => 'X509Certificate',
      'X509Certificate' => 'MIIDSzCCAjOgAwIBAgIJAObH1MsH1/icMA0GCSqGSIb3DQEBCwUAMDwxCzAJBgNVBAYTAkpQMQ4wDAYDVQQIDAVKYXBhbjEOMAwGA1UEBwwFVG9reW8xDTALBgNVBAoMBEF4c2gwHhcNMTYxMTAxMTMyMDA2WhcNMjYxMTAxMTMyMDA2WjA8MQswCQYDVQQGEwJKUDEOMAwGA1UECAwFSmFwYW4xDjAMBgNVBAcMBVRva3lvMQ0wCwYDVQQKDARBeHNoMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAqtHSgj6+hloUjYItvXxSwlZoCnVUED/4QxUKi5/22JExp4HaZgRmwMc2bRI+KmkeS+BIkkPxv+/oBDwwJ7CcK3CQ7Edz4ncdt8kQx3fQAYXgRgazeJhGJhJXULlZN2ShA1DKsECIjAlPuO9p3MnaDkDfXtCBtoQHboLK0fVmY49QfM2/TBJSQoJ6GCiHXi1n6fAOEaRsdl0QZ8YLwmSvrtO0evHvkz8uftkFuDunO/zWeOr3bcDL4FaWBfLcxNZwO+gn/WB1zQ+XTUfZ3SBsUq+jHlANqk4vdJhCJ4MsvmtcUUvMtY1GSTmeJzKW+NHD/c5Iu6lQzsshIwtKqDD2eQIDAQABo1AwTjAdBgNVHQ4EFgQUjkiDQJAF4wFSVu8YhM4zx6kWY4AwHwYDVR0jBBgwFoAUjkiDQJAF4wFSVu8YhM4zx6kWY4AwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQsFAAOCAQEAQ9wmGGaB7uEv8cOoUsEmDQpx9grUEBi8r5fLrRud0GYv2fZVBCaZYTUE5TdSQTa/BnOlAxrKbqDUWSOpcN7lq5yT6dl5PY311K9OiF6eDFsm3gD+p5Tm00/5mX1PF6pHs00SVOnFy3s1VOw/46YqgBOoxdP6nVASx5Yu7VQv10b1ImPRUo3hVF82+LbeH2Nq2k5Xdd3Xjqq/Qc+rh6ZTNFFqLjPjcaVRKq3k9JRqQWSbdfqMqGG4pjSlYrXCx6Vqnj2lh0OcPOQnmyz5X57+7wD1WPph0BC6QuVyQtVHnrK8Sfu6m6X4BjJkVdlSHCM6/QiKrYThEoLkLlKEBrQDNQ==',
    ),
  ),
);



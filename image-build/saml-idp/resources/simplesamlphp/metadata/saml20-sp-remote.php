<?php
$metadata['https://auth-proxy:441/simplesaml/module.php'] = array (
  'entityid' => 'https://auth-proxy:441/simplesaml/module.php',
  'contacts' => 
  array (
  ),
  'metadata-set' => 'saml20-sp-remote',
  'AssertionConsumerService' => 
  array (
    0 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
      'Location' => 'https://auth-proxy:441/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
      'index' => 0,
    ),
    1 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:browser-post',
      'Location' => 'https://auth-proxy:441/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp',
      'index' => 1,
    ),
    2 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
      'Location' => 'https://auth-proxy:441/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
      'index' => 2,
    ),
    3 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:artifact-01',
      'Location' => 'https://auth-proxy:441/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp/artifact',
      'index' => 3,
    ),
  ),
  'SingleLogoutService' => 
  array (
    0 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://auth-proxy:441/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
    ),
  ),
  'keys' => 
  array (
    0 => 
    array (
      'encryption' => false,
      'signing' => true,
      'type' => 'X509Certificate',
      'X509Certificate' => 'MIID5jCCAs6gAwIBAgIJAJfAmdl/3XbEMA0GCSqGSIb3DQEBBQUAMFUxCzAJBgNVBAYTAkpQMQ4wDAYDVQQIEwVUb2t5bzETMBEGA1UEBxMKQ2hpeW9kYS1rdTEMMAoGA1UEChMDTklJMRMwEQYDVQQDEwphdXRoLXByb3h5MB4XDTE3MDIwMTE3MDQ1MloXDTE3MDMwMzE3MDQ1MlowVTELMAkGA1UEBhMCSlAxDjAMBgNVBAgTBVRva3lvMRMwEQYDVQQHEwpDaGl5b2RhLWt1MQwwCgYDVQQKEwNOSUkxEzARBgNVBAMTCmF1dGgtcHJveHkwggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQDblf1cBxLIX/qo4a7kMS3HAy9ZZFgCjxvAVJUln2w84r+QwM1qJUkw8p8CB7nQFIuhV8/v0GBUlJL7c+v1mOOWe1b4yvvIQdNpH3VCh6FlLkXDoIEiD9YmqrYorLyC/bhZsfOYcX7iDlrXLWNRUw6MjXLpmR66+Dkbo3YoGb+sZ87coGBXM0pzlUBKV+xZETcJOxzv2uE2ZcnmcK0G6MNakcR36vaFlSbSQRdo5f5VLjSSFRGkbIYE+H6TsWcHU71WXez56HcHSqia3eoyHTMkIbjJXwaXdRZB0SHTjZ/0uLn6CzmlHm2JFNV71iEsC4aq2LFWV5+npfGq0fD52QbnAgMBAAGjgbgwgbUwHQYDVR0OBBYEFJXKy2XwW+JX2UCkqcHINvwXgJxYMIGFBgNVHSMEfjB8gBSVystl8FviV9lApKnByDb8F4CcWKFZpFcwVTELMAkGA1UEBhMCSlAxDjAMBgNVBAgTBVRva3lvMRMwEQYDVQQHEwpDaGl5b2RhLWt1MQwwCgYDVQQKEwNOSUkxEzARBgNVBAMTCmF1dGgtcHJveHmCCQCXwJnZf912xDAMBgNVHRMEBTADAQH/MA0GCSqGSIb3DQEBBQUAA4IBAQAABoBsLzTAX9hguM7sCMDFVN/vitQfZwz53g/41vDxZDkVm/GqT3jLMMVBYK0R+dkhCSMvqw3fm1HMc3BqIfCm2YLwRM1dPfv22595BA2lWaQMmwgSHBOhuoDb7yuVp0OmQ5h3qPq67dSQ4LIlU6ZXxP3DUQkhr3zfK3djnHRYKkQYIdrytL8SFZkdW4XuSAAWm72MbAdkYCyLAj4JZYozPRd0s5t3Yd4gfY/YqW0c9GKDhoIVRtuDMfQ0/6rQ8LxX4xZWZvubBGiuiJXgttNwyGjFgBFoPrVnrkzTXYHrHpnC3ETX4q8LujYH/CI7U0dbLvjOQweaFezHKWk4VTu+',
    ),
    1 => 
    array (
      'encryption' => true,
      'signing' => false,
      'type' => 'X509Certificate',
      'X509Certificate' => 'MIID5jCCAs6gAwIBAgIJAJfAmdl/3XbEMA0GCSqGSIb3DQEBBQUAMFUxCzAJBgNVBAYTAkpQMQ4wDAYDVQQIEwVUb2t5bzETMBEGA1UEBxMKQ2hpeW9kYS1rdTEMMAoGA1UEChMDTklJMRMwEQYDVQQDEwphdXRoLXByb3h5MB4XDTE3MDIwMTE3MDQ1MloXDTE3MDMwMzE3MDQ1MlowVTELMAkGA1UEBhMCSlAxDjAMBgNVBAgTBVRva3lvMRMwEQYDVQQHEwpDaGl5b2RhLWt1MQwwCgYDVQQKEwNOSUkxEzARBgNVBAMTCmF1dGgtcHJveHkwggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQDblf1cBxLIX/qo4a7kMS3HAy9ZZFgCjxvAVJUln2w84r+QwM1qJUkw8p8CB7nQFIuhV8/v0GBUlJL7c+v1mOOWe1b4yvvIQdNpH3VCh6FlLkXDoIEiD9YmqrYorLyC/bhZsfOYcX7iDlrXLWNRUw6MjXLpmR66+Dkbo3YoGb+sZ87coGBXM0pzlUBKV+xZETcJOxzv2uE2ZcnmcK0G6MNakcR36vaFlSbSQRdo5f5VLjSSFRGkbIYE+H6TsWcHU71WXez56HcHSqia3eoyHTMkIbjJXwaXdRZB0SHTjZ/0uLn6CzmlHm2JFNV71iEsC4aq2LFWV5+npfGq0fD52QbnAgMBAAGjgbgwgbUwHQYDVR0OBBYEFJXKy2XwW+JX2UCkqcHINvwXgJxYMIGFBgNVHSMEfjB8gBSVystl8FviV9lApKnByDb8F4CcWKFZpFcwVTELMAkGA1UEBhMCSlAxDjAMBgNVBAgTBVRva3lvMRMwEQYDVQQHEwpDaGl5b2RhLWt1MQwwCgYDVQQKEwNOSUkxEzARBgNVBAMTCmF1dGgtcHJveHmCCQCXwJnZf912xDAMBgNVHRMEBTADAQH/MA0GCSqGSIb3DQEBBQUAA4IBAQAABoBsLzTAX9hguM7sCMDFVN/vitQfZwz53g/41vDxZDkVm/GqT3jLMMVBYK0R+dkhCSMvqw3fm1HMc3BqIfCm2YLwRM1dPfv22595BA2lWaQMmwgSHBOhuoDb7yuVp0OmQ5h3qPq67dSQ4LIlU6ZXxP3DUQkhr3zfK3djnHRYKkQYIdrytL8SFZkdW4XuSAAWm72MbAdkYCyLAj4JZYozPRd0s5t3Yd4gfY/YqW0c9GKDhoIVRtuDMfQ0/6rQ8LxX4xZWZvubBGiuiJXgttNwyGjFgBFoPrVnrkzTXYHrHpnC3ETX4q8LujYH/CI7U0dbLvjOQweaFezHKWk4VTu+',
    ),
  ),
);


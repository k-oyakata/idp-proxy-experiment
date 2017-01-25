<?php
/**
 * SAML 2.0 remote SP metadata for SimpleSAMLphp.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-sp-remote
 */

$metadata['https://web.demo.org/simplesaml/module.php'] = array (
  'entityid' => 'https://web.demo.org/simplesaml/module.php',
  'contacts' => 
  array (
  ),
  'metadata-set' => 'saml20-sp-remote',
  'AssertionConsumerService' => 
  array (
    0 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
      'Location' => 'https://web.demo.org/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
      'index' => 0,
    ),
    1 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:browser-post',
      'Location' => 'https://web.demo.org/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp',
      'index' => 1,
    ),
    2 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
      'Location' => 'https://web.demo.org/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
      'index' => 2,
    ),
    3 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:artifact-01',
      'Location' => 'https://web.demo.org/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp/artifact',
      'index' => 3,
    ),
  ),
  'SingleLogoutService' => 
  array (
    0 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://web.demo.org/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
    ),
  ),
  'keys' => 
  array (
    0 => 
    array (
      'encryption' => false,
      'signing' => true,
      'type' => 'X509Certificate',
      'X509Certificate' => 'MIIDaTCCAlGgAwIBAgIJAKpdxELULXnhMA0GCSqGSIb3DQEBCwUAMEsxCzAJBgNVBAYTAkpBMQ4wDAYDVQQIDAVKYXBhbjEOMAwGA1UEBwwFVG9reW8xHDAaBgNVBAoME0RlZmF1bHQgQ29tcGFueSBMdGQwHhcNMTYxMTAzMDUzMDQ3WhcNMjYxMTAzMDUzMDQ3WjBLMQswCQYDVQQGEwJKQTEOMAwGA1UECAwFSmFwYW4xDjAMBgNVBAcMBVRva3lvMRwwGgYDVQQKDBNEZWZhdWx0IENvbXBhbnkgTHRkMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAw/h2T0JP+T4GUoTr59AtUC0rfMzzOY95+aF2U58PLol6t//fQNTI486g1I/UpNtTwLdPSE9yzGNyYwaotfINe2EqNrQROIVQlaqALJ3Q2+AOj4cvNhU3aYlQzb0j1Lq3DCp21LS1boUS4My9IELkPf+AUXpr1XTRSONEuViHvu8N/4RvI6n4dFSWSRFcc+S4nTUKUjAvn3N6a6LCV6bZkXTZrk/AsrC44utj3w+YNc2Yyuj2kWBeeOEJu/H+jWyz6wpE/lvyv7WfUVyyJtVh+k2HIrbShlbhRAqb4V2OBGxynA1UN2YUfLaiuOUYBiolnX5yP6otFGcyTq/4mmExkwIDAQABo1AwTjAdBgNVHQ4EFgQUZruLvZfEz1j4vAMUtOWBWu4lsjswHwYDVR0jBBgwFoAUZruLvZfEz1j4vAMUtOWBWu4lsjswDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQsFAAOCAQEAOrc9rlrJjaj4GhbrrRJfYMw+6ZiEZ7+PEgKoYcjVuGXfDSYWzOEACT/yvictaJ+CWZzGvwG5EhP4hVoYndjnwjetXy3T0wds2X3yxZ0qUsrTG9dYRwH81Lhuh+3W4raLix6/CnhzQA/xjOAaClCmfnsqnXOB3LX/+xKaSjOd5bWJzAHZtMnrlCDXbomeaL4+AW7xhzFFaM6is//449au7+nznKEQW84yr5DioPeriVaUXPgnLtH+8TNnlna1I/5+QegJyiO0/RjnCZvr09HUgeCtY65LIl8m8RcgBvX3y2l99gjPYqAXROjmLek6db6zbZOV5LIcTc1iH1JJOWvAxQ==',
    ),
    1 => 
    array (
      'encryption' => true,
      'signing' => false,
      'type' => 'X509Certificate',
      'X509Certificate' => 'MIIDaTCCAlGgAwIBAgIJAKpdxELULXnhMA0GCSqGSIb3DQEBCwUAMEsxCzAJBgNVBAYTAkpBMQ4wDAYDVQQIDAVKYXBhbjEOMAwGA1UEBwwFVG9reW8xHDAaBgNVBAoME0RlZmF1bHQgQ29tcGFueSBMdGQwHhcNMTYxMTAzMDUzMDQ3WhcNMjYxMTAzMDUzMDQ3WjBLMQswCQYDVQQGEwJKQTEOMAwGA1UECAwFSmFwYW4xDjAMBgNVBAcMBVRva3lvMRwwGgYDVQQKDBNEZWZhdWx0IENvbXBhbnkgTHRkMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAw/h2T0JP+T4GUoTr59AtUC0rfMzzOY95+aF2U58PLol6t//fQNTI486g1I/UpNtTwLdPSE9yzGNyYwaotfINe2EqNrQROIVQlaqALJ3Q2+AOj4cvNhU3aYlQzb0j1Lq3DCp21LS1boUS4My9IELkPf+AUXpr1XTRSONEuViHvu8N/4RvI6n4dFSWSRFcc+S4nTUKUjAvn3N6a6LCV6bZkXTZrk/AsrC44utj3w+YNc2Yyuj2kWBeeOEJu/H+jWyz6wpE/lvyv7WfUVyyJtVh+k2HIrbShlbhRAqb4V2OBGxynA1UN2YUfLaiuOUYBiolnX5yP6otFGcyTq/4mmExkwIDAQABo1AwTjAdBgNVHQ4EFgQUZruLvZfEz1j4vAMUtOWBWu4lsjswHwYDVR0jBBgwFoAUZruLvZfEz1j4vAMUtOWBWu4lsjswDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQsFAAOCAQEAOrc9rlrJjaj4GhbrrRJfYMw+6ZiEZ7+PEgKoYcjVuGXfDSYWzOEACT/yvictaJ+CWZzGvwG5EhP4hVoYndjnwjetXy3T0wds2X3yxZ0qUsrTG9dYRwH81Lhuh+3W4raLix6/CnhzQA/xjOAaClCmfnsqnXOB3LX/+xKaSjOd5bWJzAHZtMnrlCDXbomeaL4+AW7xhzFFaM6is//449au7+nznKEQW84yr5DioPeriVaUXPgnLtH+8TNnlna1I/5+QegJyiO0/RjnCZvr09HUgeCtY65LIl8m8RcgBvX3y2l99gjPYqAXROjmLek6db6zbZOV5LIcTc1iH1JJOWvAxQ==',
    ),
  ),
);

<?php return array(
    'root' => array(
        'name' => 'neto/wanzeler',
        'pretty_version' => 'dev-main',
        'version' => 'dev-main',
        'reference' => '0d7a01782e6abf4ccfc3cbde234f3eeca496cd7e',
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'components/jquery' => array(
            'pretty_version' => 'v3.7.1',
            'version' => '3.7.1.0',
            'reference' => '8edc7785239bb8c2ad2b83302b856a1d61de60e7',
            'type' => 'component',
            'install_path' => __DIR__ . '/../components/jquery',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'neto/wanzeler' => array(
            'pretty_version' => 'dev-main',
            'version' => 'dev-main',
            'reference' => '0d7a01782e6abf4ccfc3cbde234f3eeca496cd7e',
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'twbs/bootstrap' => array(
            'pretty_version' => 'v5.3.7',
            'version' => '5.3.7.0',
            'reference' => 'e0032ae6a5a628a51a8552091816cec09b6434df',
            'type' => 'library',
            'install_path' => __DIR__ . '/../twbs/bootstrap',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'twitter/bootstrap' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => 'v5.3.7',
            ),
        ),
    ),
);

<?php

namespace NunoCodex\Slumex\WordPress\ServiceProvider;

use NunoCodex\Slumex\Container\ContainerAwareInterface;
use NunoCodex\Slumex\Container\ContainerAwareTrait;
use NunoCodex\Slumex\Container\ServiceProviderInterface;

/**
 * Class GithubChecker
 * @package NunoCodex\Slumex\WordPress\ServiceProvider
 */
class GithubChecker implements ServiceProviderInterface, ContainerAwareInterface
{
    use ContainerAwareTrait;
    
    /**
     * Register Service Provider
     */
    public function register()
    {
        $c = $this->getContainer();
        
        $required_factories = [
            'github_checker.repo.url',
            'github_checker.filename',
            'github_checker.slug'
        ];
        
        foreach ($required_factories as $required_factory) {
            if (!$c->has($required_factory)) {
                die("The container factory <{$required_factory}> is required");
            }
        }
        
        $github_checker = \Puc_v4_Factory::buildUpdateChecker(
            $c->get('github_checker.repo.url'),
            $c->get('github_checker.filename'),
            $c->get('github_checker.slug')
        );
        
        if ($c->has('github_checker.repo.access_token')) {
            $github_checker->setAuthentication($c->get('github_checker.repo.access_token'));
        }
        
        if ($c->has('github_checker.repo.branch')) {
            $github_checker->setBranch($c->get('github_checker.repo.branch'));
        }
        
        if ($c->has('github_checker.repo.release')) {
        
        }
    }
}

<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-05 16:31:29
 * @LastEditTime: 2020-06-07 09:28:22
 * @FilePath: /easy-consul/src/api/Acl.php
 */ 


namespace Easy\Consul\Api;

use Easy\Consul\AbstractApi;

class Acl extends AbstractApi
{
    public function bootstrap($options)
    {
        return $this->client->doRequest('PUT','/v1/acl/bootstrap',$options);
    }

    public function create($options)
    {
        return $this->client->doRequest('PUT','/v1/acl/create',$options);
    }

    public function update($options)
    {
        return $this->client->doRequest('PUT','/v1/acl/update',$options);
    }

    public function putDestroyRest($param,$options)
    {
        return $this->client->doRequest('PUT','/v1/acl/destroy/'.$param,$options);
    }

    public function getInfoRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/acl/info/'.$param,$options);
    }

    public function putCloneRest($param,$options)
    {
        return $this->client->doRequest('PUT','/v1/acl/clone/'.$param,$options);
    }

    public function list($options)
    {
        return $this->client->doRequest('GET','/v1/acl/list',$options);
    }

    public function login($options)
    {
        return $this->client->doRequest('POST','/v1/acl/login',$options);
    }

    public function logout($options)
    {
        return $this->client->doRequest('POST','/v1/acl/logout',$options);
    }

    public function replication($options)
    {
        return $this->client->doRequest('GET','/v1/acl/replication',$options);
    }

    public function policies($options)
    {
        return $this->client->doRequest('GET','/v1/acl/policies',$options);
    }

    public function policy($options)
    {
        return $this->client->doRequest('PUT','/v1/acl/policy',$options);
    }

    public function getPolicyRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/acl/policy/'.$param,$options);
    }

    public function putPolicyRest($param,$options)
    {
        return $this->client->doRequest('PUT','/v1/acl/policy/'.$param,$options);
    }

    public function deletePolicyRest($param,$options)
    {
        return $this->client->doRequest('DELETE','/v1/acl/policy/'.$param,$options);
    }
    
    public function GetPolicyNameRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/acl/policy/name/'.$param,$options);
    }

    public function roles($options)
    {
        return $this->client->doRequest('GET','/v1/acl/roles',$options);
    }

    public function role($options)
    {
        return $this->client->doRequest('PUT','/v1/acl/role',$options);
    }

    public function getRoleNameRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/acl/role/name/'.$param,$options);
    }

    public function getRoleRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/acl/role/'.$param,$options);
    }

    public function putRoleRest($param,$options)
    {
        return $this->client->doRequest('PUT','/v1/acl/role/'.$param,$options);
    }

    public function deleteRoleRest($param,$options)
    {
        return $this->client->doRequest('DELETE','/v1/acl/role/'.$param,$options);
    }

    public function bindingRules($options)
    {
        return $this->client->doRequest('GET','/v1/acl/binding-rules',$options);
    }

    public function bindingRule($options)
    {
        return $this->client->doRequest('PUT','/v1/acl/binding-rule',$options);
    }

    public function getBindingRoleRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/acl/binding-rule/'.$param,$options);
    }

    public function putBindingRoleRest($param,$options)
    {
        return $this->client->doRequest('PUT','/v1/acl/binding-rule/'.$param,$options);
    }

    public function deleteBindingRoleRest($param,$options)
    {
        return $this->client->doRequest('DELETE','/v1/acl/binding-rule/'.$param,$options);
    }

    public function authMethods($options)
    {
        return $this->client->doRequest('GET','/v1/acl/auth-methods',$options);
    }

    public function authMethod($options)
    {
        return $this->client->doRequest('PUT','/v1/acl/auth-methods',$options);
    }

    public function getAuthMethodRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/acl/auth-method/'.$param,$options);
    }

    public function putAuthMethodRest($param,$options)
    {
        return $this->client->doRequest('PUT','/v1/acl/auth-method/'.$param,$options);
    }

    public function deleteAuthMethodRest($param,$options)
    {
        return $this->client->doRequest('DELETE','/v1/acl/auth-method/'.$param,$options);
    }

    public function translate($options)
    {
        return $this->client->doRequest('POST','/v1/acl/rules/translate',$options);
    }

    public function getTranslateRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/acl/rules/translate/'.$param,$options);
    }

    public function tokens($options)
    {
        return $this->client->doRequest('GET','/v1/acl/tokens',$options);
    }

    public function token($options)
    {
        return $this->client->doRequest('PUT','/v1/acl/token',$options);
    }

    public function tokenSelf($options)
    {
        return $this->client->doRequest('GET','/v1/acl/token/self',$options);
    }

    public function getTokenRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/acl/token/'.$param,$options);
    }

    public function putTokenRest($param,$options)
    {
        return $this->client->doRequest('PUT','/v1/acl/token/'.$param,$options);
    }

    public function deleteTokenRest($param,$options)
    {
        return $this->client->doRequest('DELETE','/v1/acl/token/'.$param,$options);
    }

}

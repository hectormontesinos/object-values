<?php

namespace App\Classes;

use Exception;

class Entity
{
    /**
     * Maps names used in sets and gets against unique
     * names within the class, allowing independence from
     * database column names.
     *
     * Example:
     *  $datamap = [
     *      'db_name' => 'class_name'
     *  ];
     */
    protected $datamap = [];
    /**
     * Holds the current values of all class vars.
     *
     * @var array
     */
    protected $attributes = [];


    /**
     * Allows filling in Entity parameters during construction.
     *
     * @param array|null $data
     */
    public function __construct(array $data = null)
    {
        $this->fill($data);
    }

    /**
     * @param array|null $data
     * @return $this
     */
    public function fill(array $data = null)
    {
        if (!is_array($data)) {
            return $this;
        }

        foreach ($data as $key => $value) {
            $this->__set($key, $value);
        }
        return $this;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function setAttributes(array $data)
    {
        $this->attributes = $data;
        return $this;
    }

    /**
     * @param string $key
     * @return string
     */
    protected function mapProperty(string $key): string
    {
        if (empty($this->datamap)) {
            return $key;
        }

        if (!empty($this->datamap[$key])) {
            return $this->datamap[$key];
        }
        return $key;
    }

    /**
     * @param string $key
     * @param null $value
     * @return $this
     */
    public function __set(string $key, $value = null)
    {
        $key = $this->mapProperty($key);
        $method = 'set' . str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $key)));

        if (method_exists($this, $method)) {
            $this->{$method}($value);
            return $this;
        }
        $this->attributes[$key] = $value;

        return $this;
    }

    function decamelize($string) {
        return strtolower(preg_replace(['/([a-z\d])([A-Z])/', '/([^_])([A-Z][a-z])/'], '$1_$2', $string));
    }
    /**
     * @param $method
     * @param $value
     * @throws Exception
     */
    public function __call($method, $value)
    {
        $type = substr($method, 0, 3);
        if (in_array($type, ['get', 'set'])) {
            $attribute = $this->decamelize(substr($method, 3));
            if ($this->__isset($attribute)) {
                if ('get' == $type) {
                    return $this->__get($attribute);
                } else {
                    return $this->__set($attribute, $value[0] ?? null);
                }
            } else {
                throw new Exception(' Property ' . $attribute . ' does not exists');
            }
        }
    }

    /**
     * @param string $key
     * @return null
     */
    public function __get(string $key)
    {
        $key = $this->mapProperty($key);
        $result = null;
        // Convert to CamelCase for the method
        $method = 'get' . str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $key)));
        if (method_exists($this, $method)) {
            $result = $this->{$method}();
        } elseif (array_key_exists($key, $this->attributes)) {
            $result = $this->attributes[$key];
        }
        return $result;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function __isset(string $key): bool
    {
        $key = $this->mapProperty($key);

        $method = 'get' . str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $key)));

        if (method_exists($this, $method)) {
            return true;
        }

        return isset($this->attributes[$key]);
    }

    /**
     * @param string $key
     */
    public function __unset(string $key): void
    {
        unset($this->attributes[$key]);
    }
}

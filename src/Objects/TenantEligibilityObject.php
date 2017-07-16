<?php

namespace ZpgRtf\Objects;

/**
 * This allows you to specify the eligibility of various classifications of applicant for a tenancy. Note that you do
 * not have to specify eligibility for all classifications.
 */
class TenantEligibilityObject implements \JsonSerializable
{
    /**
     * Enum (accepted, excluded, only)
     *
     * @var string
     */
    private $dss;

    /**
     * Enum (accepted, excluded, only)
     *
     * @var string
     */
    private $students;

    /**
     * @return string
     */
    public function getDss()
    {
        return $this->dss;
    }

    /**
     * @param string $dss
     *
     * @return TenantEligibilityObject
     */
    public function setDss($dss)
    {
        $this->dss = $dss;

        return $this;
    }

    /**
     * @return string
     */
    public function getStudents()
    {
        return $this->students;
    }

    /**
     * @param string $students
     *
     * @return TenantEligibilityObject
     */
    public function setStudents($students)
    {
        $this->students = $students;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize()
    {
        return [
            'dss' => $this->getDss(),
            'students' => $this->getStudents(),
        ];
    }
}

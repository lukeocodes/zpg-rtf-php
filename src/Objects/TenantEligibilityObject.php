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
     * @var null|string
     */
    private $dss;

    /**
     * Enum (accepted, excluded, only)
     *
     * @var null|string
     */
    private $students;

    /**
     * @return null|string
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
    public function setDss(string $dss): self
    {
        $this->dss = $dss;

        return $this;
    }

    /**
     * @return null|string
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
    public function setStudents(string $students): self
    {
        $this->students = $students;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize(): array
    {
        return array_filter([
            'dss' => $this->getDss(),
            'students' => $this->getStudents(),
        ]);
    }
}
